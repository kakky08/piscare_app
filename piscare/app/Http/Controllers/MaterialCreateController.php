<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {/*
        $requests = $request;
        $materials = $request->material;
        $quantities = $request->quantity;
        return view('materialtest', compact('materials', 'quantities', 'requests')); */
        return view('postRecipe.materialCreate');
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
    public function store(Request $request, Material $material)
    {
        /*  $material->material = $request->material;
        $material->quantity = $request->quantity; */
        // dd($request);

        $materials = $request->materials;
        foreach ($materials as $material) {
            Material::create([
                'postRecipe_id' => $material['postId'],
                'materialName' => $material['materialName'],
                'quantity' => $material['quantity'],
            ]);
        }




        // $postId = $request->postId;
        return redirect()->route('home');
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
    public function edit($materialCreate)
    {
        $materials = Material::where('postRecipe_id', $materialCreate)->get();
        $postId = $materialCreate;

        return view('postRecipe.materialCreate', compact('materials', 'postId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $material->fill($request->all());
        $material->save();
        return redirect()->route('/');
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
