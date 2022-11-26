@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'Etat des Lieux </h3>
                        </div>

                        {{-- <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('nouveau_client') }}" style="color:aliceblue"> Creer Locataire</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2></h2>
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
                                                        <th>N</th>
                                                        <th>Nom</th>
                                                        <th>Libre</th>
                                                        <th>Occupé</th>
                                                        <th>Ensemble</th>
                                                        <th>Inutilisable</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Emplacement</td>
                                                        <td>{{ $dashboard[0]->nbr_emplacement_non }}</td>
                                                        <td>{{ $dashboard[0]->nbr_emplacement_occup }}</td>
                                                        <td>{{ $dashboard[0]->nbr_emplacement }}</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Compteur CIE</td>
                                                        <td>{{ $dashboard[0]->nbr_cie - $dashboard[0]->nbr_cie_occup }}</td>
                                                        <td>{{ $dashboard[0]->nbr_cie_occup }}</td>
                                                        <td>{{ $dashboard[0]->nbr_cie }}</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Compteur SODECI</td>
                                                        <td>{{ $dashboard[0]->nbr_sodeci - $dashboard[0]->nbr_sodeci_occup }}</td>
                                                        <td>{{ $dashboard[0]->nbr_sodeci_occup }}</td>
                                                        <td>{{ $dashboard[0]->nbr_sodeci }}</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Compteur GAZ</td>
                                                        <td>{{ $dashboard[0]->nbr_gaz - $dashboard[0]->nbr_gaz_occup }}</td>
                                                        <td>{{ $dashboard[0]->nbr_gaz_occup }}</td>
                                                        <td>{{ $dashboard[0]->nbr_gaz }}</td>
                                                        <td>0</td>
                                                    </tr>
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