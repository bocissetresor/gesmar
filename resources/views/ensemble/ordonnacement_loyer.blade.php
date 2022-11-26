@extends('layouts.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>L'ensemble des Loyers </h3>
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
                        <h2>Les Loyers</h2>
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
                                                <th>Code Contrat</th>
                                                <th>Date Debut</th>
                                                <th>Type</th>
                                                <th>Code Locataire</th>
                                                <th>Nom de Locataire</th>
                                                <th>Adresse Postale</th>
                                                <th>Faire Ordonnancement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contrats as $contrat)
                                            @if ($contrat->statut_buro1==1 && $contrat->statut_buro2==1 && $contrat->statut_buro3==1 &&$contrat->statut_ordonnacement==0 )
                                                <tr>
                                                    <td>{{ $contrat->code }}</td>
                                                    <td>{{ $contrat->date_debut }}</td>
                                                    <td>{{ $contrat->type }}</td>
                                                    <td>{{ $contrat->code_locataire }}</td>
                                                    <td>{{ $contrat->nom_locataire }}</td>
                                                    <td>{{ $contrat->adresse_postale }}</td>
                                                    <td style="text-align: center;"><a href="{{ url('ordonnacement_loyer_page', ['id' => $contrat->id]) }}"class="btn btn-warning btn-xs"><i class="fa fa-sort-amount-desc"></i> Ordonner </a></td>

                                                    {{-- <td><a href="{{ url('edit_contrat', ['id' => $contrat->id]) }}">Editer</a></td>
                                                    <td><a href="{{ url('supprimer_contrat', ['id' => $contrat->id]) }}">Supprimer</a></td> --}}
                                                </tr>
                                            @endif
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