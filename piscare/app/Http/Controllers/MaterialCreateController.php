<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialStoreRequest;
use App\Http\Requests\MaterialUpdateRequest;
use App\Http\Requests\PeopleRequest;
use App\Material;
use App\PostRecipe;
use Illuminate\Http\Request;

class MaterialCreateController extends Controller
{

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
    public function store(MaterialStoreRequest $request)
    {

        Material::create([
            'post_recipe_id' => $request->store_postId,
            'material_name' => $request->store_material,
            'quantity' => $request->store_quantity,
        ]);


        return redirect()->route('materialCreate.edit', ['materialCreate' => $request->store_postId])->with('completion-of-registration-material', '登録が完了しました。');
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
        $postId = $materialCreate;
        $peoples = PostRecipe::where('id', $postId)->select('people')->first();
        $materials = Material::where('post_recipe_id', $postId)->select('material_name', 'quantity')->get();
        $count = 0;
        return view('postRecipe.materialCreate.app', compact('materials', 'postId', 'count', 'peoples'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterialUpdateRequest $request, Material $material)
    {

        Material::where('post_recipe_id' , $request->edit_postId)->delete();
        $materials = $request->materials;
        foreach ($materials as $material) {
            Material::create([
                'post_recipe_id' => $request->edit_postId,
                'material_name' => $material['materialName'],
                'quantity' => $material['quantity'],
            ]);
        }
        // dd($request->edit_postId);
        return redirect()->route('materialCreate.edit', ['materialCreate' => $request->edit_postId])->with('completion-of-registration-material', '更新が完了しました。');
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

    public function getData(){
        $data = Material::where('post_recipe_id', 1)->get();
        dd($data);
        return $data;
    }

    /**
     * 戻るボタンによる処理
     *
     * @param  int  $materialCreate
     * @return \Illuminate\Http\Response
     */

    public function back($materialCreate){
        return redirect()->route('postRecipe.edit', ['postRecipe' => $materialCreate]);
    }

    /**
     * 何人分の材料かを登録・更新する処理
     *
     * @param  int  $materialCreate
     * @return \Illuminate\Http\Response
     */

    public function peopleUpdate(PeopleRequest $request){

        $postRecipe =  PostRecipe::where('id', $request->post_id)->where('user_id', $request->user)->first();
        $postRecipe->people = $request->update_people;
        $postRecipe->save();

        return redirect()->route('materialCreate.edit', ['materialCreate' => $request->post_id])->with('completion-of-registration-people', '登録が完了しました。');
    }
}
