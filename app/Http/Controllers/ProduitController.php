<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response             
     */
    public function index()
    {
        $r = Produit::all();
        $c = Categorie::all();
        return view('Produit.index',['r'=>$r ,'c'=>$c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r = Produit::all();
        $c = Categorie::all();
        return view('Produit.create',['r'=>$r , 'c'=>$c]);
         // katdik l  view et exactemment create,
        //  la la mashi hna meme si ma 3dnash l contollers dyalha, mais ressource a l'
        //  aide de convention RESTful 
        // kaycreyi lina les routes de chaque methode atomatiquement  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Ces annotations sont utiles pour la documentation du code, mais elles ne sont pas strictement nécessaires pour que le code fonctionne correctement. Cependant, 
     * il est une bonne pratique de les inclure pour aider les développeurs qui travaillent sur le code à comprendre son fonctionnement. De plus, les outils et les IDE peuvent utiliser ces annotations pour améliorer l'expérience de développement.
     */
    
    // libelle
    // marque
    // prixAchat
    // prixVente
    // quantiterSt
    // categorie_id
    public function store(Request $request)
    {
        // request katjib lina les donner dyal la requtte HTTP entrantes. w hadchi ki dar automatiquemnt
        $p = new Produit();
        $p->libelle=$request['libelle'];
        $p->marque=$request['marque'];
        $p->prixAchat=$request['prixAchat'];
        $p->prixVente=$request['prixVente'];
        $p->quantiterSt=$request['quantiterSt'];
        $p->categorie_id=$request['categorie_id'];
        $p->save();
        return redirect('/produit')->with('statusC', 'Profile updated!');
        // /produit raha route w katmchi l index bsh trecuper les donner
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $r = Produit::find($id);
        $c = Categorie::all();
        return view('Produit.edit',['p'=>$r , 'c'=>$c]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p = Produit::find($id);
        $p->libelle=$request['libelle'];
        $p->marque=$request['marque'];
        $p->prixAchat=$request['prixAchat'];
        $p->prixVente=$request['prixVente'];
        $p->quantiterSt=$request['quantiterSt'];
        $p->categorie_id=$request['categorie_id'];
        $p->save();
        return redirect('/produit')->with('statusU', 'Profile updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $p = Produit::find($id);
        $p->delete();
        return redirect('/produit')->with('statusS', 'Profile updated!');
    }
}
