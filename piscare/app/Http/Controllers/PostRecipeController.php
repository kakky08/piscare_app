<?php

namespace App\Http\Controllers;

use App\Material;
use App\PostRecipe;
use App\Seasoning;
use Illuminate\Http\Request;

class PostRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = PostRecipe::paginate(12);
        return view('postRecipe.postRecipe', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostRecipe $postRecipe)
    {

        $title = $postRecipe->title;
        $postId = $postRecipe->id;
        $peoples = $postRecipe->people;

        $materials = Material::where('post_recipe_id', $postId)->select('material_name', 'quantity')->get();
        $seasonings = Seasoning::where('post_recipe_id', $postId)->select('seasoning_name', 'quantity')->get();


        $count = 0;
        return view('postRecipe.postCreate', compact('title', 'postId', 'materials', 'seasonings', 'count', 'peoples'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
