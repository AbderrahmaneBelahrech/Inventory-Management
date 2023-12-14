@extends('layouts.master')
@section('content')
<br><br>
<div class="page-content-wrapper ">

    <div class="container-fluid">
            
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Modifier un Client</h4>
                        
                        <p class="text-muted m-b-30../plugins">
                            <!-- The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built. -->
                        </p>
        <!-- nom
        tele
        email
        adresse
        ville -->
                             <form action="{{route('client.update',['client'=>$p->id])}}" id="basic-form" method="post" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nom</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$p->nom}}"type="text" name="nom"  id="example-text-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">tele</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$p->tele}}" type="text" name="tele"  id="example-text-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$p->email}}" type="text" name="email"  id="example-text-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">adresse</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$p->adresse}}" type="text" name="adresse" id="example-text-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">ville</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$p->ville}}" type="text" name="ville" id="example-text-input">
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <a  class="btn btn-primary " href="{{route('client.index')}}">Retoure</a>

                            </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->         

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@stop
