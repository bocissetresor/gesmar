@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des Contrats de {{ $nom }} {{ $denomination }} </h3>
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
                                <h2>Code: {{ $code_locataire }}</h2>
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
                                                        <th>Code Contras</th>
                                                        <th>Date Début Contrat</th>
                                                        <th>Somme à Payer</th>
                                                        <th>Somme Payer à Ouverture</th>
                                                        <th>Somme Restant à Ouverture</th>
                                                        <th>Code CIE</th>
                                                        <th>Code Sodeci</th>
                                                        <th>Code Gaz</th>
                                                        <th>Code Autre Equipement</th>
                                                        <th>Statut Ordonnancement</th>
                                                        <th>Statut Paiement</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($locataires as $locataire)

                                                    <tr>
                                                        <td>{{ $locataire->code_contrat }}</td>
                                                        <td>{{ $locataire->date_debut }}</td>
                                                        <td>{{ $locataire->som_toto }}</td>
                                                        <td>{{ $locataire->som_payer_ouverture }}</td>
                                                        <td>{{ $locataire->som_restant_ouverture }}</td>
                                                        @if($locataire->code_cie!=NULL)
                                                            <td>{{ $locataire->code_cie }}</td>
                                                        @else
                                                            <td style="text-align: center; color:red"><i class="fa fa-times-circle fa-2x"></i></td>
                                                        @endif
                                                        @if($locataire->code_sodeci!=NULL)
                                                            <td>{{ $locataire->code_sodeci }}</td>
                                                        @else
                                                            <td style="text-align: center; color:red"><i class="fa fa-times-circle fa-2x"></i></td>
                                                        @endif
                                                        @if($locataire->code_gaz!=NULL)
                                                            <td>{{ $locataire->code_gaz }}</td>
                                                        @else
                                                            <td style="text-align: center; color:red"><i class="fa fa-times-circle fa-2x"></i></td>
                                                        @endif
                                                        @if($locataire->code_propriete!=NULL)
                                                            <td>{{ $locataire->code_propriete }}</td>
                                                        @else
                                                            <td style="text-align: center; color:red"><i class="fa fa-times-circle fa-2x"></i></td>
                                                        @endif
                                                        @if($locataire->statut_buro2==1)
                                                            <td style="text-align: center; color:green;"><i class="fa fa-check-square fa-2x"></i></td>
                                                        @else
                                                            <td style="text-align: center; color:red"><i class="fa fa-times-circle fa-2x"></i></td>
                                                        @endif
                                                        @if($locataire->statut_buro3==1)
                                                            <td style="text-align: center; color:green;"><i class="fa fa-check-square fa-2x"></i></td>
                                                        @else
                                                            <td style="text-align: center;color:red"><i class="fa fa-times-circle fa-2x"></i></td>
                                                        @endif
                                                        <td>{{ $locataire->created_at }}</td>
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