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
                            <div class="card-header" style="display: flex;justify-content: space-between;margine-bottom: 100px;">
                                <h4 class="mt-0 header-title">Liste des Clients</h4>

                                <div style="margine-bottom: 10px;lefte: 200px;" class="row">
                                    <div class="col-lg-12" style="margine-left ">
                                        <a class="btn btn-success" style="margine-bottom: 10px;lefte: 200px; "href="{{ route('client.create') }}">
                                            ajouter
                                        </a>
                                    </div>
                                </div> 
                                    
                            </div>
                        </head>    
<br>
                        <p class="text-muted m-b-30../plugins">
                            <!-- The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built. -->
                        </p>

<br>                     

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom du client</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Ville</th>
                                <th>action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($r as $p)
                            <tr>
                                <td>
                                    <span>{{ $p->id }}</span>
                                </td>
                                <td>
                                    <span>{{ $p->nom }}</span>
                                </td>
                                <td>
                                    <span>{{ $p->email }}</span>
                                </td>
                                <td>
                                    <span>{{ $p->tele }}</span>
                                </td>
                                <td>
                                    <span>{{ $p->ville }}</span>
                                </td>

                                <td class="d-flex">
                                    <a href="{{ route('client.edit',['client' => $p->id]) }}" class="btn btn-info btn-sm m-1 mt-0" title="Edit"><i class="fa fa-edit"></i></a>
                                    <form  action="{{ route('client.destroy',['client' => $p->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button href="button" class="btn btn-danger btn-sm m-1 mt-0" title="Delete"><i class="fa fa-trash"></i></button>
                                    </form>
                                    
                                </td>
                            </tr>
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