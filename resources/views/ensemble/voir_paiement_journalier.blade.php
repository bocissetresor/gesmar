@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Historique journalière </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('liste_paiement') }}" style="color:aliceblue"><h2> Somme totale actu: {{ $somme_total[0]->som_jr }} XOF</h2></a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Historique</h2>
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
                                                        <th scope="col">N°paiement</th>
                                                        <th scope="col">Somme Payer</th>
                                                        <th scope="col">Date paiement</th>
                                                        <th scope="col">Motif</th>
                                                        <th scope="col">Code contrat</th>
                                                        <th scope="col">Date début contrat</th>
                                                        <th scope="col">Code locataire</th>
                                                        <th scope="col">Nom locataire</th>
                                                        <th scope="col">Adress locataire</th>
                                                        <th scope="col">Statut paiement</th>
                                                    </tr>
                                                </thead>
                                                @foreach($caisses as $caisse)
                                                <tbody>
                                                  <td>{{ $caisse->num_paiement }}-Caiss-2022</td>
                                                  <td>{{ $caisse->somme_payer }}</td>
                                                  <td>{{ $caisse->date_payement }}</td>
                                                  @if($caisse->loyer_id !=null)
                                                    <td>LOYER</td>
                                                  @elseif($caisse->ciepaiement_id!=null)
                                                    <td>CIE</td>
                                                  @elseif($caisse->sodecipaiement_id!=null)
                                                    <td>SODECI</td>
                                                  @elseif($caisse->gazpaiement_id!=null)
                                                    <td>GAZ</td>
                                                  @elseif($caisse->proprietepaiement_id!=null)
                                                    <td>AUTRE</td>
                                                  @endif
                                                  <td>{{ $caisse->code_contrat }}</td>
                                                  <td>{{ $caisse->date_debut_contrat }}</td>
                                                  <td>{{ $caisse->code_locataire }}</td>
                                                  <td>{{ $caisse->nom_locataire }}</td>
                                                  <td>{{ $caisse->adresse_postale }}</td>
                                                  <td style="color:green"><i class="fa fa-check-square fa-2x"></i></td>

                                               
                                              </tbody>
                                              @endforeach
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