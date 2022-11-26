@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des Contrats et ces Equipements </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('ancien_client') }}" style="color:aliceblue"> Voir Locataire</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Les Contrats</h2>
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
                                                        <th>statut Bureau 1</th>
                                                        <th>statut Bureau 2</th>
                                                        <th>statut Bureau 3</th>
                                                        <th scope="col">Regler index Cie</th>
                                                        <th scope="col">Regler index Sodeci</th>
                                                        <th scope="col">Regler index Gaz</th>
                                                        <th scope="col">Regler index Autre Equipement</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($contrats as $contrat)

                                                        <tr>
                                                            <td>{{ $contrat->code_contrat }}</td>
                                                            <td>{{ $contrat->date_debut }}</td>
                                                            <td>{{ $contrat->type }}</td>
                                                            <td>{{ $contrat->code_locataire }}</td>
                                                            <td>{{ $contrat->nom_locataire }}</td>
                                                            <td>{{ $contrat->adresse_postale }}</td>
                                                            @if($contrat->statut_buro1==1)
                                                                <td style="text-align: center; color:green"><i class="fa fa-check-square-o fa-2x"></i></td>
                                                            @else
                                                                <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                            @endif
                                                            @if($contrat->statut_buro2==1)
                                                                <td style="text-align: center; color:green"><i class="fa fa-check-square-o fa-2x"></i></td>
                                                            @else
                                                                <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                            @endif
                                                            @if($contrat->statut_buro3==1)
                                                                <td style="text-align: center; color:green"><i class="fa fa-check-square-o fa-2x"></i></td>
                                                            @else
                                                                <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                            @endif
                                                            @if($contrat->compteur_cie_id==1)
                                                                <td style="text-align: center;"><a href="{{ url('regler_index_cie2', ['id' => $contrat->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i>Regler</a></td>
                                                            @else
                                                                <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                            @endif
                                                            @if($contrat->compteur_sodeci_id==1)
                                                                <td style="text-align: center;"><a href="{{ url('regler_index_sodeci', ['id' => $contrat->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i>Regler</a></td>
                                                            @else
                                                                <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                            @endif
                                                            @if($contrat->gaz_id==1)
                                                                <td style="text-align: center;"><a href="{{ url('regler_index_gaz', ['id' => $contrat->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i>Regler</a></td>
                                                            @else
                                                                <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                            @endif
                                                            @if($contrat->propriete_id==1)
                                                                <td style="text-align: center;"><a href="{{ url('regler_index_equipement', ['id' => $contrat->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i>Regler</a></td>
                                                            @else
                                                                <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                            @endif



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