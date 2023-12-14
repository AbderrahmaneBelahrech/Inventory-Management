<?php

namespace App\Http\Controllers;

use App\Approproduit;
use App\Produit;
use App\Fornisseur;
use App\Approvisionnement;
use Illuminate\Http\Request;

class ApproproduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = Approproduit::all();
        $c = Fornisseur::all();
        return view('Approproduit.index',['r'=>$r ,'c'=>$c]);
    }

    public function createe( $id)
    {
        $i=$id;
        $r = Approproduit::all();
        $c = Produit::all();
        return view('Approproduit.create',['r'=>$r , 'c'=>$c, 'i'=>$i]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r = Approproduit::all();
        $c = Produit::all();
        $p = Approvisionnement::all();
        return view('Approproduit.create',['r'=>$r , 'c'=>$c, 'p'=>$p]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        // quantiteApp
    // approvisionnement_id
    // produit_id
    public function store(Request $request)
    {
        $p = new Approproduit();
        $p->quantiteApp=$request['quantiteApp'];
        $p->approvisionnement_id=$request['approvisionnement_id'];
        $p->produit_id=$request['produit_id'];
        $q = Produit::find($p->produit_id);
        $q->quantiterSt= $q->quantiterSt + $request['quantiteApp'];
        $q->save();
        $p->save();
        return redirect('/approvisionnement')->with('statusC', 'Profile updated!');
    }

    // quantiteApp
    // Approproduit_id
    // produit_id
    /**
     * Display the specified resource.
     *
     * @param  \App\Approproduit  $approproduit
     * @return \Illuminate\Http\Response
     */
    public function show(Approproduit $approproduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Approproduit  $approproduit
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $r = Approproduit::find($id);
        $c = Fornisseur::all();
        return view('Approproduit.edit',['p'=>$r , 'c'=>$c]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Approproduit  $approproduit
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $p = Approproduit::find($id);
        $p->quantiteApp=$request['quantiteApp'];
        $p->approproduit_id=$request['approproduit_id'];
        $p->produit_id=$request['produit_id'];
        $p->save();
        return redirect('/approvisionnement')->with('statusU', 'Profile updated!'); 
    }
    
    // quantiteApp
    // approvisionnement_id
    // produit_id

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Approproduit  $approproduit
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $p = Approproduit::find($id);
        $q = Produit::find($p->produit_id);

        if($p->quantiteApp <= $q->quantiterSt)
        {   
            $a=$q->quantiterSt - $p->quantiteApp;
            $q->quantiterSt=$a;
            $q->save();
            $p->delete();
            return redirect('/approvisionnement')->with('statusSS', 'Profile updated!');
        }

        return redirect('/approvisionnement')->with('statusM', 'Profile updated!');
    }
}
