<?php

namespace App\Http\Controllers;

use App\Approvisionnement;
use App\Approproduit;
use App\Produit;
use App\Fornisseur;
use Illuminate\Http\Request;

class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = Approvisionnement::all();
        $c = Fornisseur::all();
        return view('Approvisionnement.index',['r'=>$r ,'c'=>$c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r = Approvisionnement::all();
        $c = Fornisseur::all();
        return view('Approvisionnement.create',['r'=>$r , 'c'=>$c]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Approvisionnement();
        $p->dateApp=$request['dateApp'];
        $p->fornisseur_id=$request['fornisseur_id'];
        $p->save();
        return redirect('/approvisionnement')->with('statusC', 'Profile updated!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $i=$id;
        $r = Approproduit::all();
        $c = Produit::all();
        return view('Approvisionnement.show',['r'=>$r , 'aa'=>$c, 'i'=>$i]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $r = Approvisionnement::find($id);
        $c = Fornisseur::all();
        return view('Approvisionnement.edit',['p'=>$r , 'c'=>$c]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p = Approvisionnement::find($id);
        $p->dateApp=$request['dateApp'];
        $p->fornisseur_id=$request['fornisseur_id'];
        $p->save();
        return redirect('/approvisionnement')->with('statusU', 'Profile updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $p = Approvisionnement::find($id);
        //$p = Produit::find($id);
        //$p->delete();
        return redirect('/approvisionnement')->with('statusS', 'Profile updated!');
    }
}


// fornisseur_id
// dateApp
