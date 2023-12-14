<?php

namespace App\Http\Controllers;

use App\Commandeprod;
use App\Client;
use App\Approproduit;
use App\Produit;
use App\Commande;
use Illuminate\Http\Request;

class CommandeprodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = Commandeprod::all();
        $c = Client::all();
        return view('Commandeprod.index',['r'=>$r ,'c'=>$c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r = Commandeprod::all();
        $c = Produit::all();
        $p = Commande::all();
        return view('Commandeprod.create',['r'=>$r , 'c'=>$c, 'p'=>$p]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Commandeprod();
        $p->quantiteCom=$request['quantiteCom'];
        $p->commande_id=$request['commande_id'];
        $p->produit_id=$request['produit_id'];
        $q = Produit::find($p->produit_id);

        if($p->quantiteCom > $q->quantiterSt)
        {   
            return redirect('/commande')->with('statusPP', 'Profile updated!');
        }
        $q->quantiterSt= $q->quantiterSt - $request['quantiteCom'];
        $q->save();
        $p->save();
        return redirect('/commande')->with('statusCC', 'Profile updated!');
    }
// quantiteCom
// commande_id
// produit_id
    /**
     * Display the specified resource.
     *
     * @param  \App\Commandeprod  $commandeprod
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
     * @param  \App\Commandeprod  $commandeprod
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $r = Commandeprod::find($id);
        $c = Client::all();
        return view('Commandeprod.edit',['p'=>$r , 'c'=>$c]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commandeprod  $commandeprod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p = Commandeprod::find($id);
        $p->quantiteApp=$request['quantiteApp'];
        $p->approproduit_id=$request['approproduit_id'];
        $p->produit_id=$request['produit_id'];
        $p->save();
        return redirect('/commande')->with('statusU', 'Profile updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commandeprod  $commandeprod
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $p = Commandeprod::find($id);
        $q = Produit::find($p->produit_id);       
        $a=$q->quantiterSt + $p->quantiteCom;
        $q->quantiterSt=$a;
        $q->save();
        $p->delete();
        return redirect('/commande')->with('statusSS', 'Profile updated!');
    }
}
