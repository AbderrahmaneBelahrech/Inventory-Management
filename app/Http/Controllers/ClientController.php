<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = Client::all();
        return view('Client.index',['r'=>$r]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r = Client::all();
        return view('Client.create',['r'=>$r ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Client();
        $p->nom=$request['nom'];
        $p->tele=$request['tele'];
        $p->email=$request['email'];
        $p->adresse=$request['adresse'];
        $p->ville=$request['ville'];
        $p->save();
        return redirect('/client')->with('statusC', 'Profile updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $r = Client::find($id);
        return view('Client.edit',['p'=>$r]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p = Client::find($id);
        $p->nom=$request['nom'];
        $p->tele=$request['tele'];
        $p->email=$request['email'];
        $p->adresse=$request['adresse'];
        $p->ville=$request['ville'];
        $p->save();
        return redirect('/client')->with('statusU', 'Profile updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $p = Client::find($id);
        $p->delete();
        return redirect('/client')->with('statusS', 'Profile updated!');
    }
}
