<?php

namespace App\Http\Controllers;

use App\Recipe;
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
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(12);
        $subcategories = Subcatergory::all()->sortBy('id');
        $subsubcategories = Subsubcatergory::all()->sortBy('id');
        return view('recipes.pages.recipe', compact('recipes', 'subcategories', 'subsubcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $subcategories = Subcatergory::all()->sortBy('id');
        $subsubcategories = Subsubcatergory::all()->sortBy('id');
        return view('recipes.detail', compact('recipe', 'subcategories', 'subsubcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($recipe)
    {

    }

    /**
     * カテゴリ検索
     *
     * @param  int  $recipe
     * @return \Illuminate\Http\Response
     */
    public function category($recipe)
    {
        $recipes = Recipe::where('search_category_id', 'LIKE', "$recipe%")->orderBy('created_at', 'desc')->paginate(12);;
        $subcategories = Subcatergory::all()->sortBy('id');
        $subsubcategories = Subsubcatergory::all()->sortBy('id');
        return view('recipes.recipe', compact('recipes', 'subcategories', 'subsubcategories'));
    }

    /**
     * カテゴリ検索
     *
     * @param  int  $recipe
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $recipes = Recipe::where('title', 'LIKE', "%$request->search%")->orderBy('created_at', 'desc')->paginate(12);;
        $subcategories = Subcatergory::all()->sortBy('id');
        $subsubcategories = Subsubcatergory::all()->sortBy('id');
        return view('recipes.recipe', compact('recipes', 'subcategories', 'subsubcategories'));
    }

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
