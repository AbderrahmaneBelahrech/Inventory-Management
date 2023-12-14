<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Client;
use App\Commandeprod;
use App\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = Commande::all();
        $c = Client::all();
        return view('Commande.index',['r'=>$r ,'c'=>$c]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r = Commande::all();
        $c = Client::all();
        return view('Commande.create',['r'=>$r , 'c'=>$c]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // dateC
    // client_id
    public function store(Request $request)
    {
        $p = new Commande();
        $p->dateC=$request['dateC'];
        $p->client_id=$request['client_id'];
        $p->save();
        return redirect('/commande')->with('statusC', 'Profile updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $i=$id;
        $r = Commandeprod::all();
        $c = Produit::all();
        return view('Commande.show',['r'=>$r , 'aa'=>$c, 'i'=>$i]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $r = Commande::find($id);
        $c = Client::all();
        return view('Commande.edit',['p'=>$r , 'c'=>$c]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $p = Commande::find($id);
        $p->dateC=$request['dateC'];
        $p->client_id=$request['client_id'];
        $p->save();
        return redirect('/commande')->with('statusU', 'Profile updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $p = Commande::find($id);
        $p->delete();
        return redirect('/commande')->with('statusS', 'Profile updated!');
    }
}
