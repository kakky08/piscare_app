<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\RecipeMaterial;
use App\Subcatergory;
use App\Subsubcatergory;
use RakutenRws_Client;


class RecipeController extends Controller
{
    /**
     *
     *  楽天APIからカテゴリとレシピを取得し、DBに保存する処理
     *
     */
    public function register()
    {
        $client = new RakutenRws_Client();
        define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));

        $client->setApplicationId('1012872856628443358');


        // RecipeCategoryListをレスポンス
        $response = $client->execute('RecipeCategoryList');

        /**
         * レシピカテゴリ(中カテゴリ)
         */

        // if (!$response->isOk())
        // {
        //     return 'Error:' . $response->getMessage();
        // }
        // else
        // {
        //     $results = $response['result'];
        //     foreach ($results['medium'] as $key => $result)
        //     {
        //         if ($result['parentCategoryId'] === '11' || $result['parentCategoryId'] === '32')
        //         {

        //             $categoryId = Subcatergory::where('category_id', $result['categoryId'])->first();

        //             if (empty($categoryId))
        //             {
        //                 Subcatergory::create([
        //                     'category_id' => $result['categoryId'],
        //                     'category_name' => $result['categoryName'],
        //                     'parent_category_id' => $result['parentCategoryId'],
        //                     'search_category_id' => $result['parentCategoryId'] . $result['categoryId'],
        //                     'search_recipe_id' => sprintf('%s-%s', $result['parentCategoryId'], $result['categoryId'])
        //                 ]);
        //             }
        //         }
        //     }
        // }

        /**
         * レシピカテゴリ(小カテゴリ)
         */

        // if (!$response->isOk())
        // {
        //     return 'Error:' . $response->getMessage();
        // }
        // else
        // {
        //     $results = $response['result'];
        //     foreach ($results['small'] as $key => $result)
        //     {
        //         $subcategoryId = Subcatergory::where('category_id', $result['parentCategoryId'])->first();

        //         // 中カテゴリにparentCategoryIdがあれば実行
        //         if (isset($subcategoryId))
        //         {
        //             $is_subsubcategoryId = Subsubcatergory::where('category_id', $result['categoryId'])->first();
        //             // 小カテゴリにcategoryIdがなければ実行
        //             if (empty($is_subsubcategoryId))
        //             {
        //                 $subcatergorySearchId = Subcatergory::where('category_id', $result['parentCategoryId'])->select('search_category_id', 'search_recipe_id')->first();
        //                 Subsubcatergory::create([
        //                     'category_id' => $result['categoryId'],
        //                     'category_name' => $result['categoryName'],
        //                     'parent_category_id' => $result['parentCategoryId'],
        //                     'search_category_id' => $subcatergorySearchId->search_category_id . $result['categoryId'],
        //                     'search_recipe_id' => sprintf('%s-%s', $subcatergorySearchId->search_recipe_id, $result['categoryId'])
        //                 ]);
        //             }
        //         }
        //     }
        // }



        /**
         * カテゴリ別ランキング
         */

        /**
         * 中カテゴリのレシピを取得
         */

        $searchRecipes = Subcatergory::select('parent_category_id', 'search_category_id', 'search_recipe_id')->get();
        foreach ($searchRecipes as $searchRecipe)
        {
            $response = $client->execute('RecipeCategoryRanking', array(
                'category_id' => $searchRecipe->search_recipe_id,
            ));

            if (!$response->isOk())
            {
                return 'Error:' . $response->getMessage();
            }
            else
            {
                $results = $response['result'];
                foreach ($results as $result)
                {
                    $recipeId = Recipe::where('recipe_id', $result['recipeId'])->first();
                    // レシピがなかったら実行
                    if (empty($recipeId))
                    {
                        Recipe::create([
                            'recipe_id' => $result['recipeId'],
                            'category_id' => $searchRecipe->parent_category_id,
                            'search_category_id' => $searchRecipe->search_category_id,
                            'title' => $result['recipeTitle'],
                            'url' => $result['recipeUrl'],
                            'food_image_url' => $result['foodImageUrl'],
                            'medium_image_url' => $result['mediumImageUrl'],
                            'small_image_url' => $result['smallImageUrl'],
                            'contributor' => $result['nickname'],
                            'description' => $result['recipeDescription'],
                            'indication' => $result['recipeIndication'],
                            'cost' => $result['recipeCost'],
                        ]);

                        foreach ($result['recipeMaterial'] as $key => $material)
                        {
                            RecipeMaterial::create([
                                'recipe_id' => $result['recipeId'],
                                'order' => $key,
                                'name' => $material,
                            ]);
                        }
                    }
                }
            }
            sleep(2);
        }

        /**
         * 小カテゴリのレシピを取得
         */

        $searchRecipes = Subsubcatergory::select('parent_category_id', 'search_category_id', 'search_recipe_id')->get();
        foreach ($searchRecipes as $searchRecipe)
        {
            $response = $client->execute('RecipeCategoryRanking', array(
                'category_id' => $searchRecipe->search_recipe_id,
            ));

            if (!$response->isOk())
            {
                return 'Error:' . $response->getMessage();
            }
            else
            {
                $results = $response['result'];

                foreach ($results as $result)
                {
                    $recipeId = Recipe::where('recipe_id', $result['recipeId'])->first();
                    // レシピがなかったら実行
                    if (empty($recipeId))
                    {
                        Recipe::create([
                            'recipe_id' => $result['recipeId'],
                            'category_id' => $searchRecipe->parent_category_id,
                            'search_category_id' => $searchRecipe->search_category_id,
                            'title' => $result['recipeTitle'],
                            'url' => $result['recipeUrl'],
                            'food_image_url' => $result['foodImageUrl'],
                            'medium_image_url' => $result['mediumImageUrl'],
                            'small_image_url' => $result['smallImageUrl'],
                            'contributor' => $result['nickname'],
                            'description' => $result['recipeDescription'],
                            'indication' => $result['recipeIndication'],
                            'cost' => $result['recipeCost'],
                        ]);

                        foreach ($result['recipeMaterial'] as $key => $material)
                        {
                            RecipeMaterial::create([
                                'recipe_id' => $result['recipeId'],
                                'order' => $key,
                                'name' => $material,
                            ]);
                        }
                    }
                }
            }
            sleep(1);
        }

        return redirect()->route('admin.home')->with('successMessage', '登録に成功しました。');
    }

}
