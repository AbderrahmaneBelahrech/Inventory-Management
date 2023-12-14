@extends('layouts.master')
@section('content')
<br><br>
<div class="page-content-wrapper ">

    <div class="container-fluid">
            
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Ajouter un produit</h4>
                        
                        <p class="text-muted m-b-30../plugins">
                            <!-- The Buttons extension for DataTables
                                                     provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built. -->
                        </p>
                             <!-- libelle -->
                             <!-- marque -->
                             <!-- prixAchat -->
                             <!-- prixVente -->
                             <!-- quantiterSt -->
                             <!-- categorie_id -->

                        <form action="{{route('produit.store')}}" id="basic-form" method="post" novalidate>
                            @csrf
                            @method('')

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">libelle</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="libelle"  id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">marque</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="marque"  id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">prix d'Achat</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="prixAchat"  id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">prixVente</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="prixVente" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">quantiter du stocke</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="quantiterSt" id="example-text-input">
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">categorie_id</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="categorie_id" id="example-text-input">
                                </div>
                            </div> -->
                            <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">categorie du produit</label>
                                <select class="selectpicker" name="categorie_id"  required>
                                <option value="a"  selected>choisire la categorie</option>
                                   @foreach($c as $p)
                                       <option value="{{ $p->id }}">{{ $p->nom }}</option>
                                   @endforeach
                               </select>
                            </div>
                                       
                             
                        

                            <br>
                            <button type="submit" value="Submit" class="btn btn-primary">Ajouter</button>
                            <a  class="btn btn-primary " href="{{route('produit.index')}}">retoure</a>
                            <!-- <a class="btn btn-primary" href="/produit">Retour</a> -->
                        </form>



                        
                        

                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->         

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@stop