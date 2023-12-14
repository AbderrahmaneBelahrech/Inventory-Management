@extends('layouts.master')
@section('content')
<br><br>
<div class="page-content-wrapper ">

    <div class="container-fluid">
            
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Ajouter une approvisionnement</h4>
                        
                        <p class="text-muted m-b-30../plugins">
                            <!-- The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built. -->
                        </p>
                        </p>
                        <!-- // fornisseur_id -->
                        <!-- // dateApp -->

                        <form action="{{route('approvisionnement.store')}}" id="basic-form" method="post" novalidate>
                            @csrf
                            @method('')


                            <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Fornisseur</label>
                                <select class="selectpicker" name="fornisseur_id"  required>
                                <option value="a"  selected>choisire un Fornisseur</option>
                                @foreach($c as $p)
                                    <option value="{{ $p->id }}">{{ $p->nom }}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Date de l'approvisionnement</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" name="dateApp"  id="example-text-input">
                                </div>
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