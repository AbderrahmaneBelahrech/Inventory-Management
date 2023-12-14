@extends('layouts.master')
@section('content')
<br><br>
<div class="page-content-wrapper ">

    <div class="container-fluid">
            
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Ajouter un Produit</h4>
                        
                        <p class="text-muted m-b-30../plugins">
                            <!-- The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built. -->
                        </p>
                        </p>
<!-- quantiteApp
    // approvisionnement_id
    // produit_id -->

                        <form action="{{route('approproduit.store')}}" id="basic-form" method="post" novalidate>
                            @csrf
                            @method('')


                            <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Produit</label>
                                <select class="selectpicker" name="produit_id"  required>
                                <option value="a"  selected>choisire un Produit</option>
                                @foreach($c as $k)
                                    <option value="{{ $k->id }}">{{ $k->libelle }}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Quantite </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="quantiteApp"  id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Approvisionnement</label>
                                    <select class="selectpicker" name="approvisionnement_id"  required>
                                    <option value="a"  selected>choisire le numero de l'approvisionnement</option>
                                    @foreach($p as $k)
                                        <option value="{{ $k->id }}">{{ $k->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br>
                            <button type="submit" value="Submit" class="btn btn-primary">Ajouter</button>
                            <a  class="btn btn-primary " href="{{route('approvisionnement.index')}}">retoure</a>
                        </form>



                        
                        

                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->         

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@stop