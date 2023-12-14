@extends('layouts.master')
@section('content')
<br><br>
<div class="page-content-wrapper ">

    <div class="container-fluid">
            
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Modifier une categorie</h4>
                        
                        <p class="text-muted m-b-30../plugins">
                            <!-- The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built. -->
                        </p>

                             <form action="{{route('categorie.update',['categorie'=>$p->id])}}" id="basic-form" method="post" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nom du categorie</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{$p->nom}}"type="text" name="nom"  id="example-text-input">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <a  class="btn btn-primary " href="{{route('categorie.index')}}">Retoure</a>

                            </form>


                        
                        

                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->         

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@stop