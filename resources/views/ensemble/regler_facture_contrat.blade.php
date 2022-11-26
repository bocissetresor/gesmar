@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Liste des Contrats Ordonnés </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button"  ><a href="{{ url('ancien_client') }}" style="color:aliceblue"> Retour</a></button>
                          
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
                                            <th>Date Paiement</th>
                                            <th>Type</th>
                                            <th>Code Locataire</th>
                                            <th>Nom de Locataire</th>
                                            <th>Adresse Postale</th>
                                            <th>Editer</th>
                                            <th>Regler Facture</th>
                                            <th>Statut</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contrats as $contrat)
                                    @foreach ($contrat->ordonnacement_contrats as $ordonnacement_contrat)
                                        @if ($contrat->statut_buro2 == 1 && $contrat->statut_buro3 == 0 && $ordonnacement_contrat->statut==0 )
                                                <tr>
                                                    <td>{{ $contrat->code }}</td>
                                                    <td>{{ $ordonnacement_contrat->date_ordonnacement }}</td>
                                                    <td>{{ $contrat->type }}</td>
                                                    <td>{{ $contrat->code_locataire }}</td>
                                                    <td>{{ $contrat->nom_locataire }}</td>
                                                    <td>{{ $contrat->adresse_postale }}</td>

                                                    <td style="text-align: center;"><a href="{{ url('edit_contrat', ['id' => $contrat->id]) }}"class="btn btn-primary btn-xs"><i class="fa fa-print"></i>Imprime</a></td>
                                                    @if ($ordonnacement_contrat->date_ordonnacement < date('Y-m-d'))
                                                        <td style="text-align: center;"><a href="{{ url('regler_facture_contrat_buro3', ['id' => $contrat->id]) }}"class="btn btn-success btn-xs"><i class="fa fa-money"></i>Regler</a></td>
                                                        <td style="text-align: center;" ><a href="" class="btn btn-warning btn-xs" style="pointer-events: none; cursor: default;"><i class="fa fa-check-square-o"></i>En Retart</a></td>
                                                    @endif
                                                    @if ($ordonnacement_contrat->date_ordonnacement == date('Y-m-d'))
                                                            <td style="text-align: center;"><a href="{{ url('regler_facture_contrat_buro3', ['id' => $contrat->id]) }}"class="btn btn-success btn-xs"><i class="fa fa-money"></i>Regler</a></td>
                                                            <td style="text-align: center;" ><a href="" class="btn btn-success btn-xs" style="pointer-events: none; cursor: default;"><i class="fa fa-check-square-o"></i>A jour</a></td>

                                                    @endif
                                                    @if ($ordonnacement_contrat->date_ordonnacement > date('Y-m-d'))
                                                        <td  style="text-align: center;"><a href="" class="btn btn-danger btn-xs" style="pointer-events: none; cursor: default;"><i class="fa fa-close"></i>Imposible</a></td>
                                                        
                                                        <td style="text-align: center; color:red">La date n'est pas encore arrivé</td>
                                                    @endif
                                                    <td style="text-align: center;"><a href="{{ url('supprimer_contrat', ['id' => $contrat->id]) }}"class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Supprime</a></td>

                                                </tr>
                                            @endif
                                        @endforeach
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