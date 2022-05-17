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

        if (!$response->isOk()) {
            return 'Error:' . $response->getMessage();
        } else {
            $results = $response['result'];
            foreach ($results['medium'] as $key => $result) {
                if ($result['parentCategoryId'] === '11' || $result['parentCategoryId'] === '32') {
                    $categoryId = Subcatergory::where('categoryId', $result['categoryId'])->first();
                    if (empty($categoryId)) {
                        Subcatergory::create([
                            'categoryId' => $result['categoryId'],
                            'categoryName' => $result['categoryName'],
                            'parentCategoryId' => $result['parentCategoryId'],
                            'searchCategoryId' => $result['parentCategoryId'] . $result['categoryId'],
                            'searchRecipeId' => sprintf('%s-%s', $result['parentCategoryId'], $result['categoryId'])
                        ]);
                    }
                }
            }
        }

        /**
         * レシピカテゴリ(小カテゴリ)
         */

        if (!$response->isOk()) {
            return 'Error:' . $response->getMessage();
        } else {
            $results = $response['result'];
            foreach ($results['small'] as $key => $result) {
                $subcategoryId = Subcatergory::where('categoryId', $result['parentCategoryId'])->first();
                // 中カテゴリにparentCategoryIdがあれば実行
                if (isset($subcategoryId)) {
                    $is_subsubcategoryId = Subsubcatergory::where('categoryId', $result['categoryId'])->first();
                    // 小カテゴリにcategoryIdがなければ実行
                    if (empty($is_subsubcategoryId)) {
                        $subcatergorySearchId = Subcatergory::where('categoryId', $result['parentCategoryId'])->select('searchCategoryId', 'searchRecipeId')->first();
                        Subsubcatergory::create([
                            'categoryId' => $result['categoryId'],
                            'categoryName' => $result['categoryName'],
                            'parentCategoryId' => $result['parentCategoryId'],
                            'searchCategoryId' => $subcatergorySearchId->searchCategoryId . $result['categoryId'],
                            'searchRecipeId' => sprintf('%s-%s', $subcatergorySearchId->searchRecipeId, $result['categoryId'])
                        ]);
                    }
                }
            }
        }


        /**
         * カテゴリ別ランキング
         */

        /**
         * 中カテゴリのレシピを取得
         */

        $searchRecipes = Subcatergory::select('parentCategoryId', 'searchCategoryId', 'searchRecipeId')->get();
        foreach ($searchRecipes as $searchRecipe) {
            $response = $client->execute('RecipeCategoryRanking', array(
                'categoryId' => $searchRecipe->searchRecipeId,
            ));
            if (!$response->isOk()) {
                return 'Error:' . $response->getMessage();
            } else {
                $results = $response['result'];
                foreach ($results as $result) {
                    $recipeId = Recipe::where('recipeId', $result['recipeId'])->first();
                    // レシピがなかったら実行
                    if (empty($recipeId)) {
                        Recipe::create([
                            'recipeId' => $result['recipeId'],
                            'categoryId' => $searchRecipe->parentCategoryId,
                            'searchCategoryId' => $searchRecipe->searchCategoryId,
                            'title' => $result['recipeTitle'],
                            'url' => $result['recipeUrl'],
                            'foodImageUrl' => $result['foodImageUrl'],
                            'mediumImageUrl' => $result['mediumImageUrl'],
                            'smallImageUrl' => $result['smallImageUrl'],
                            'contributor' => $result['nickname'],
                            'description' => $result['recipeDescription'],
                            'indication' => $result['recipeIndication'],
                            'cost' => $result['recipeCost'],
                        ]);

                        foreach ($result['recipeMaterial'] as $material) {
                            RecipeMaterial::create([
                                'recipeId' => $result['recipeId'],
                                'order' => $key,
                                'name' => $material,
                            ]);
                        }
                    }
                }
            }
            sleep(1);
        }

        /**
         * 小カテゴリのレシピを取得
         */

        $searchRecipes = Subsubcatergory::select('parentCategoryId', 'searchCategoryId', 'searchRecipeId')->get();
        foreach ($searchRecipes as $searchRecipe) {
            $response = $client->execute('RecipeCategoryRanking', array(
                'categoryId' => $searchRecipe->searchRecipeId,
            ));
            if (!$response->isOk()) {
                return 'Error:' . $response->getMessage();
            } else {
                $results = $response['result'];
                foreach ($results as $result) {
                    $recipeId = Recipe::where('recipeId', $result['recipeId'])->first();
                    // レシピがなかったら実行
                    if (empty($recipeId)) {
                        Recipe::create([
                            'recipeId' => $result['recipeId'],
                            'categoryId' => $searchRecipe->parentCategoryId,
                            'searchCategoryId' => $searchRecipe->searchCategoryId,
                            'title' => $result['recipeTitle'],
                            'url' => $result['recipeUrl'],
                            'foodImageUrl' => $result['foodImageUrl'],
                            'mediumImageUrl' => $result['mediumImageUrl'],
                            'smallImageUrl' => $result['smallImageUrl'],
                            'contributor' => $result['nickname'],
                            'description' => $result['recipeDescription'],
                            'indication' => $result['recipeIndication'],
                            'cost' => $result['recipeCost'],
                        ]);

                        foreach ($result['recipeMaterial'] as $key => $material) {
                            RecipeMaterial::create([
                                'recipeId' => $result['recipeId'],
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
