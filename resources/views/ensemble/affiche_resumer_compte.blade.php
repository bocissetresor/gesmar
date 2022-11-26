@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des Contrats </h3>
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
                                                    <th>Voir Ordonnancement</th>
                                                    <th>Voir Equipement</th>
                                                    <th>Somme Totale a payer</th>
                                                    <th>Somme payer à Ouverture</th>
                                                    <th>Somme Restant</th>
                                                    <th>Editer</th>
                                                    <th>Supprimer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($contrats as $contrat)
                                                    <tr>
                                                        <td>{{ $contrat->code }}</td>
                                                        <td>{{ $contrat->date_debut }}</td>
                                                        <td>{{ $contrat->type }}</td>
                                                        <td>{{ $contrat->code_locataire }}</td>
                                                        <td>{{ $contrat->nom_locataire }}</td>
                                                        <td>{{ $contrat->adresse_postale }}</td>
                                                        <td><a href="{{ url('ordonnancement', ['id' => $contrat->id]) }}">Ordonnancement</a></td>
                                                        <td>Voir Equip</td>
                                                        <td>{{ $contrat->som_toto }}</td>
                                                        <td>{{ $contrat->som_payer_ouverture }}</td>
                                                        <td>{{ $contrat->som_restant_ouverture }}</td>
                                                        <td style="text-align: center;"><a href="{{ url('edit_contrat', ['id' => $contrat->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>Voir</a></td>
                                                        <td style="text-align: center;"><a href="{{ url('supprimer_contrat', ['id' => $contrat->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Supprime</a></td>

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