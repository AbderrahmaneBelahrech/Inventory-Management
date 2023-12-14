@extends('layouts.master')
@section('content')
<br>
@if (session('statusC'))

    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>bient ajouter!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>

@endif

@if (session('statusS'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>bient supprimer!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>

@endif

@if (session('statusU'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>bient modifier!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>

@endif
<br><br>
<div class="page-content-wrapper ">

    <div class="container-fluid">
            
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <head>
                            <div class="card-header">
                                <h4 class="mt-0 header-title">Liste des produits</h4>
                                     
                            </div>
                        </head>

                        <p class="text-muted m-b-30../plugins">
                            The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built.
                        </p>    
                        <!-- // quantiteApp
                        // approvisionnement_id
                        // produit_id -->
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Numero de l'approvisionnement</th>
                                <th>libelle du produit</th>
                                <th>quantite demander</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($r as $p)
                                <div style="margine-bottom: 10px;lefte: 200px;" class="row">
                                    <div class="col-lg-12">
                                        <a class="btn btn-success" href="{{ route('approproduit.createe',['id' => $p->approvisionnement_id]) }}">
                                            ajouter
                                        </a>
                                    </div>
                                </div> 
                                    @if ($i == $p->approvisionnement_id)
                                        <tr>
                                            <td>
                                                {{$p->approvisionnement_id}}
                                            </td>

                                            
                                            <td>
                                                @foreach($aa as $ii)

                                                    @if ($ii->id == $p->produit_id)

                                                        <span> {{ $ii->libelle  }}</span>

                                                    @endif

                                                @endforeach
                                            </td>

                                            <td>
                                                <span>{{ $p->quantiteApp }}</span>
                                            </td>
                                            <td class="d-flex">
                                                <!-- <a href="{{ route('approproduit.show',['approproduit' => $p->id]) }}" class="btn btn-info btn-sm m-1 mt-0" title="show"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('approproduit.edit',['approproduit' => $p->id]) }}" class="btn btn-info btn-sm m-1 mt-0" title="Edit"><i class="fa fa-edit"></i></a>
                                                -->
                                                <form  action="{{ route('approproduit.destroy',['approproduit' => $p->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href="button" class="btn btn-danger btn-sm m-1 mt-0" title="Delete"><i class="fa fa-trash"></i></button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->         

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
@stop