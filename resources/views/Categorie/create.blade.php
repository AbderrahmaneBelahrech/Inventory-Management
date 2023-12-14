@extends('layouts.master')
@section('content')
<br><br>
<div class="page-content-wrapper ">

    <div class="container-fluid">
            
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Ajouter une categorie</h4>
                        
                        <p class="text-muted m-b-30../plugins">
                        </p>

                        <form action="{{route('categorie.store')}}" id="basic-form" method="post" novalidate>
                            @csrf
                            @method('')

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nom du categorie</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="nom"  id="example-text-input">
                                </div>
                            </div>
                                       
                             
                        

                            <br>
                            <button type="submit" value="Submit" class="btn btn-primary">Ajouter</button>
                            <a  class="btn btn-primary " href="{{route('categorie.index')}}">retoure</a>
                        </form>



                        
                        

                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->         

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@stop