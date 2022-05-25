<?php

namespace App\Http\Controllers;

use App\Material;
use App\Post;
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
        $recipes = Post::orderBy('updated_at', 'desc')->paginate(20);
        return view('postRecipe.pages.app', compact('recipes'));
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
    public function show($postRecipe)
    {
        $recipe = Post::where('id', $postRecipe)->first();
        return view('postRecipe.pages.detail', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postRecipe, Post $post)
    {

        $title = $post->title;
        $postId = $postRecipe;
        $peoples = $post->people;

        $materials = Material::where('post_recipe_id', $postId)->select('material_name', 'quantity')->get();
        $seasonings = Seasoning::where('post_recipe_id', $postId)->select('seasoning_name', 'quantity')->get();


        $count = 0;
        return view('postRecipe.create.post', compact('title', 'postId', 'materials', 'seasonings', 'count', 'peoples'));
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

    /**
     * いいね機能
     */
    public function like(Request $request, Post $post)
    {
        $post->likes()->detach($request->user()->id);
        $post->likes()->attach($request->user()->id);

        return [
            'id' => $post->id,
            'countLikes' => $post->count_likes,
        ];
    }

    public function unlike(Request $request, Post $post)
    {
        $post->likes()->detach($request->user()->id);

        return [
            'id' => $post->id,
            'countLikes' => $post->count_likes,
        ];
    }
}
