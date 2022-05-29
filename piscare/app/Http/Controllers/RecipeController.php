<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeMaterial;
use App\Subcatergory;
use App\Subsubcatergory;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Recipe $recipe)
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(20);
        $subcategories = Subcatergory::all()->sortBy('id');
        $subsubcategories = Subsubcatergory::all()->sortBy('id');
        return view('recipe.pages.app', compact('recipes', 'subcategories', 'subsubcategories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($recipe)
    {
        $recipe = Recipe::where('id', $recipe)->first();
        $materials = $recipe->recipeMaterial->sortBy('order');
        $subcategories = Subcatergory::all()->sortBy('id');
        $subsubcategories = Subsubcatergory::all()->sortBy('id');
        return view('recipe.pages.detail', compact('recipe', 'materials', 'subcategories', 'subsubcategories'));
    }


    /**
     * レシピ名検索
     *
     * @param  int  $recipe
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $recipes = Recipe::where('title', 'LIKE', "%$request->search%")->orWhere('description', 'LIKE', "%$request->search%")->orderBy('created_at', 'desc')->paginate(20);
        $subcategories = Subcatergory::all()->sortBy('id');
        $subsubcategories = Subsubcatergory::all()->sortBy('id');
        return view('recipe.pages.app', compact('recipes', 'subcategories', 'subsubcategories'));

    }
    /**
     * カテゴリ検索
     *
     * @param  int  $recipe
     * @return \Illuminate\Http\Response
     */
    public function category($recipe)
    {
        // $recipes = Recipe::where('searchCategoryId', 'LIKE', "$recipe%")->orderBy('created_at', 'desc')->paginate(12);;
        // $subcategories = Subcatergory::all()->sortBy('id');
        // $subsubcategories = Subsubcatergory::all()->sortBy('id');
        // return view('recipes.pages.recipe', compact('recipes', 'subcategories', 'subsubcategories'));
    }

    /**
     * カテゴリ検索
     *
     * @param  int  $recipe
     * @return \Illuminate\Http\Response
     */
    /* public function search(Request $request)
    { */
        // dd($search);
    //     $recipes = Recipe::where('title', 'LIKE', "%$request->search%")->orderBy('created_at', 'desc')->paginate(12);
    //     $subcategories = Subcatergory::all()->sortBy('id');
    //     $subsubcategories = Subsubcatergory::all()->sortBy('id');
    //     return view('recipes.pages.recipe', compact('recipes', 'subcategories', 'subsubcategories'));
    /* } */


    /**
     * いいね機能
     */
    public function like(Request $request, Recipe $recipe)
    {
        $recipe->likes()->detach($request->user()->id);
        $recipe->likes()->attach($request->user()->id);

        return [
            'id' => $recipe->id,
            'countLikes' => $recipe->count_likes,
        ];
    }

    public function unlike(Request $request, Recipe $recipe)
    {
        $recipe->likes()->detach($request->user()->id);

        return [
            'id' => $recipe->id,
            'countLikes' => $recipe->count_likes,
        ];
    }


}
