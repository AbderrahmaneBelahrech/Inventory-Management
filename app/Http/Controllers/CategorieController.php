<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = Categorie::all();
        return view('Categorie.index',['r'=>$r]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r = Categorie::all();
        return view('Categorie.create',['r'=>$r ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Categorie();
        $p->nom=$request['nom'];
        $p->save();
        return redirect('/categorie')->with('statusC', 'Profile updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $r = Categorie::find($id);
        return view('Categorie.edit',['p'=>$r]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $p = Categorie::find($id);
        $p->nom=$request['nom'];
        $p->save();
        return redirect('/categorie')->with('statusU', 'Profile updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $p = Categorie::find($id);
        $p->delete();
        return redirect('/categorie')->with('statusS', 'Profile updated!');
    }
}
