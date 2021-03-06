<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRecipeNameRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostRecipeNameController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postRecipe.create.name');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRecipeNameRequest $request, Post $postRecipe)
    {
        $postRecipe->fill($request->all());
        $postRecipe->user_id = $request->user()->id;
        $postRecipe->save();
        $postId = $postRecipe->id;


        return redirect()->route('postRecipe.edit', ['postRecipe' => $postId]);
    }


}
