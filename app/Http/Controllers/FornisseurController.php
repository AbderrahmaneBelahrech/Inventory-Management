<?php

namespace App\Http\Controllers;

use App\Fornisseur;
use Illuminate\Http\Request;

class FornisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = Fornisseur::all();
        return view('Fornisseur.index',['r'=>$r]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r = Fornisseur::all();
        return view('Fornisseur.create',['r'=>$r ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Fornisseur();
        $p->nom=$request['nom'];
        $p->tele=$request['tele'];
        $p->email=$request['email'];
        $p->adresse=$request['adresse'];
        $p->ville=$request['ville'];
        $p->save();
        return redirect('/fornisseur')->with('statusC', 'Profile updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fornisseur $fornisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $r = Fornisseur::find($id);
        return view('Fornisseur.edit',['p'=>$r]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p = Fornisseur::find($id);
        $p->nom=$request['nom'];
        $p->tele=$request['tele'];
        $p->email=$request['email'];
        $p->adresse=$request['adresse'];
        $p->ville=$request['ville'];
        $p->save();
        return redirect('/fornisseur')->with('statusU', 'Profile updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fornisseur  $fornisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $p = Fornisseur::find($id);
        $p->delete();
        return redirect('/fornisseur')->with('statusS', 'Profile updated!');
    }
}
