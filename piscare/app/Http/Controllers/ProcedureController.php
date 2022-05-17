<?php

namespace App\Http\Controllers;

use App\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sumple');
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
        $path = $request->file->store('public');

        Procedure::create([
            'post_recipe_id' => $request->postId,
            'order' => 1,
            'photo' => basename($path),
            /* 'photo' => asset('storage/' . basename($path)), */
            'procedure' => $request['procedure'],
        ]);

        return redirect()->route('procedure.edit', ['procedure' => $request->postId])->with('completion-of-registration-material', '更新が完了しました。');
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
    public function edit($editProcedure)
    {
        $procedures = Procedure::where('post_recipe_id', $editProcedure)->get();
        $postId = $editProcedure;
        $path = asset('storage/');

        return view('postRecipe.procedureCreate.app', compact('procedures', 'postId', 'path'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $procedure)
    {
        dd($request->procedures);
        // Procedure::where('post_recipe_id' , $procedure)->delete();
        $procedures = $request->procedures;
        if(!empty($procedures))
        {

            foreach ($procedures as $procedure)
            {
                $path = $procedure['path']->store('public');

                Procedure::create([
                    'post_recipe_id' => $request->edit_postId,
                    'photo' => basename($path),
                    'procedure' => $procedure['procedure'],
                    'order' => 1
                ]);
            }
        }
        return redirect()->route('procedure.edit', ['procedure' => $request->edit_postId])->with('completion-of-registration-material', '更新が完了しました。');

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
