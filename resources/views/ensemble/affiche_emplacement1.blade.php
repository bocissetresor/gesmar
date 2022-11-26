@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des emplacements </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('affiche') }}" style="color:aliceblue"> Creer Emplacement</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Les Emplacements</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">

                                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Code</th>
                                                        <th scope="col">Nom Emplacement</th>
                                                        <th scope="col">Superficie</th>
                                                        <th scope="col">Loyer</th>
                                                        <th scope="col">Pas de Porte</th>
                                                        <th scope="col">Zone</th>
                                                        <th scope="col">Etage</th>
                                                        <th scope="col">Batiment</th>
                                                        <th scope="col">Site</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Editer</th>
                                                        <th scope="col">Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($emplacements as $emplacement)
                                                    <tr>
                                                        <td>{{ $emplacement->code }}</td>
                                                        <td>{{ $emplacement->designation }}</td>
                                                        <td>{{ $emplacement->superficie }}</td>
                                                        <td>{{ $emplacement->loyer }}</td>
                                                        <td>{{ $emplacement->pas_porte }}</td>
                                                        <td>{{ $emplacement->zone->designation }}</td>
                                                        <td>{{ $emplacement->zone->etage->designation }}</td>
                                                        <td>{{ $emplacement->zone->etage->batiment->designation }}</td>
                                                        <td>{{ $emplacement->zone->etage->batiment->site->designation }}</td>
                                                        @if($emplacement->statut==1)
                                                            <td style="text-align: center;color: green";><i class="fa fa-check-square fa-2x"></i></td>
                                                        @else
                                                            <td style="text-align: center;color: red";><i class="fa fa-close fa-2x"></i></td>
                                                        @endif
                                                        
                                                        <td><a href="{{ url('edit_emplacement', ['id' => $emplacement->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Editer</a></td>
                                                        <td><a href="{{ url('supprimer_emplacement', ['id' => $emplacement->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Supprimer</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection