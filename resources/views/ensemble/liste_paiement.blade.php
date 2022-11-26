@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
      <div class="page-title">
          <div class="title_left">
              <h3>LA CAISSE</h3>
          </div>

          <div class="title_right">
              <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">

                  </div>
              </div>
          </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
          <div class="col-md-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>La gestion de la caisse</h2>
                      <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <section class="content invoice">
                          <!-- title row -->
                          <div class="row">
                              <div class="  invoice-header">
                                  <h1>
                                      <i class="fa fa-calendar"></i>
                                      <small class="pull-right"> 
                                          
                                            <script>
                                            date = new Date().toLocaleDateString();
                                            document.write(date);
                                            </script>
                                          
                                      </small>
                                  </h1>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">
                              <div class="col-sm-4 invoice-col">
                                  Heure d'ouverture 07h:00 <br> Somme d'ouverture : 1000 XOF
                                  <br> Commentaire a l'ouverture : Néant
                              </div>
                          </div>
                          <hr>
                          
                          <h3 style="text-align:center">Liste des Options</h3> <br>
                          <div style="text-align:center">
                              <a class="btn btn-app" href="{{ url('regler_facture_contrat') }}">
                                  <i class="glyphicon glyphicon-file"></i> CONTRAT
                              </a>
                              <a class="btn btn-app" href="{{ url('paiement') }}">
                                  <i class="glyphicon glyphicon-home"></i> LOYER
                              </a>
                              <a class="btn btn-app" href="{{ url('paiement_cie') }}">
                                  <i class="glyphicon glyphicon-certificate"></i> CIE
                              </a>
                              <a class="btn btn-app" href="{{ url('paiement_sodeci') }}">
                                  <i class="glyphicon glyphicon-tint"></i> SODECI
                              </a>
                              <a class="btn btn-app" href="{{ url('paiement_gaz') }}">
                                  <span class="badge bg-red">6</span>
                                  <i class="glyphicon glyphicon-cutlery"></i> GAZ
                              </a>
                              <a class="btn btn-app" href="{{ url('paiement_equipement') }}">
                                  <i class="glyphicon glyphicon-tasks"></i> AUTRE
                              </a>

                          </div>
                          <hr>
                          <h1>SOMME ACTU : {{ $caisses[0]->som_jr }} XOF</h1>
                          <hr>
                          <h3>Les 20 derneiers paiements </h3>
                          <!-- Table row -->
                          <div class="row">
                              <div class="  table">
                                  <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>Code</th>
                                              <th>Somme</th>
                                              <th>Motif</th>
                                              <th>Mode</th>
                                              <th>Status</th>
                                          </tr>
                                      </thead>
                                      @foreach($liste_paiements as $liste_paiement)
                                      <tbody>
                                        
                                          <td>2022/045A</td>
                                          <td>{{ $liste_paiement->somme_payer }}</td>
                                          @if($liste_paiement->loyer_id !=null)
                                            <td>LOYER</td>
                                          @elseif($liste_paiement->ciepaiement_id!=null)
                                            <td>CIE</td>
                                          @elseif($liste_paiement->sodecipaiement_id!=null)
                                            <td>SODECI</td>
                                          @elseif($liste_paiement->gazpaiement_id!=null)
                                            <td>GAZ</td>
                                          @elseif($liste_paiement->proprietepaiement_id!=null)
                                            <td>AUTRE</td>
                                          @endif
                                          <td>Espece</td>
                                          <td style="color:green"><i class="fa fa-check-square fa-2x"></i></td>
                                        
                                          {{-- <tr>
                                              <td>2022/045A</td>
                                              <td>15.000 XOF</td>
                                              <td>Loyer</td>
                                              <td>Espece</td>
                                              <td>Succes</td>
                                          </tr>
                                          <tr>
                                              <td>2022/015A</td>
                                              <td>2.000.000 XOF</td>
                                              <td>Pas de Porte</td>
                                              <td>Cheque</td>
                                              <td>Sucess</td>
                                          </tr>
                                          <tr>
                                              <td>2022/005A</td>
                                              <td>25.000 XOF</td>
                                              <td>Loyer</td>
                                              <td>Espece</td>
                                              <td>Echec</td>
                                          </tr>
                                          <tr>
                                              <td>2022/085B</td>
                                              <td>25.000 XOF</td>
                                              <td>Loyer</td>
                                              <td>Espece</td>
                                              <td>Sucess</td>
                                          </tr> --}}
                                      </tbody>
                                      @endforeach
                                  </table>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <div class="row">
                              <!-- accepted payments column -->
                              <div class="col-md-6">
                                  <p class="lead">Les méthodes de paiements disponibles:</p>
                                  <img src="{{ url('images/visa.png') }}" alt="Visa">
                                  <img src="{{ url('images/mastercard.png') }}" alt="Mastercard">
                                  <img src="{{ url('images/american-express.png') }}" alt="American Express">
                                  <img src="{{ url('images/paypal.png') }}" alt="Paypal">

                              </div>
                              <!-- /.col -->
                              <div class="col-md-6">
                                  <p class="lead">Nombre des paiements</p>
                                  <div class="table-responsive">
                                      <table class="table">
                                          <tbody>
                                              <tr>
                                                  <th style="width:50%">Contrat:</th>
                                                  <td>{{ $caisses[0]->nbr_loyer_jr }}</td>
                                                  <td>{{ $caisses[0]->som_loyer_jr }} XOF</td>
                                              </tr>
                                              <tr>
                                                  <th>Loyer</th>
                                                  <td>{{ $caisses[0]->nbr_loyer_jr }}</td>
                                                  <td>{{ $caisses[0]->som_loyer_jr }} XOF</td>
                                              </tr>
                                              <tr>
                                                  <th>CIE:</th>
                                                  <td>{{ $caisses[0]->nbr_cie_jr }}</td>
                                                  <td>{{ $caisses[0]->som_cie_jr }} XOF</td>
                                              </tr>
                                              <tr>
                                                  <th>SODECI:</th>
                                                  <td>{{ $caisses[0]->nbr_sodeci_jr }}</td>
                                                  <td>{{ $caisses[0]->som_sodeci_jr }} XOF</td>
                                              </tr>
                                              <tr>
                                                  <th>GAZ:</th>
                                                  <td>{{ $caisses[0]->nbr_gaz_jr }}</td>
                                                  <td>{{ $caisses[0]->som_gaz_jr }} XOF</td>
                                              </tr>
                                              <tr>
                                                  <th>AUTRE EQUIPEMENT:</th>
                                                  <td>{{ $caisses[0]->nbr_prop_jr }}</td>
                                                  <td>{{ $caisses[0]->som_prop_jr }} XOF</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- this row will not appear when printing -->
                          <div class="row no-print">
                              <div class=" ">
                                  <button class="btn btn-success pull-right" onclick="window.print();"><i class="fa fa-print"></i> Imprime L'etat</button>
                              </div>
                              <div class=" ">
                                  <button class="btn btn-danger pull-right"><a href="{{ url('fermer_caisse') }}" style="color:aliceblue"><i class="fa fa-remove"></i> Fermer Caisse</a></button>
                              </div>
                              <div class=" ">
                                  <button class="btn btn-primary pull-right"><a href="{{ url('voir_paiement_journalier') }}" style="color:aliceblue"><i class="fa fa-eye"></i> La liste journalière</a></button>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>



       {{--  <div class="card-header">
          Liste des Paiements
        </div>
        <div class="card-body">
          <h5 class="card-title"><a href="{{ url('regler_facture_contrat') }}">Paiement Contrat</h5>
          <h5 class="card-title"><a href="{{ url('paiement') }}">Paiement Loyer</a></h5>
          <h5 class="card-title"><a href="{{ url('paiement_cie') }}">Paiement Cie</a></h5>
          <h5 class="card-title"><a href="{{ url('paiement_sodeci') }}">Paiement Sodeci</a></h5>
          <h5 class="card-title"><a href="{{ url('paiement_gaz') }}">Paiement Gaz</a></h5>
          <h5 class="card-title"><a href="{{ url('paiement_equipement') }}">Paiement Autre Equipement</a></h5>
        </div>
        <hr>
        Somme encaisser pour LOYER :<input type="text" value="{{ $caisses[0]->som_loyer_jr }}" readonly>
        Somme encaisser pour CIE :<input type="text" value="{{ $caisses[0]->som_cie_jr }}" readonly>
        Somme encaisser pour SODECI :<input type="text" value="{{ $caisses[0]->som_sodeci_jr }}" readonly>
        Somme encaisser pour GAZ :<input type="text" value="{{ $caisses[0]->som_gaz_jr }}" readonly>
        Somme encaisser pour AUTRE :<input type="text" value="{{ $caisses[0]->som_prop_jr }}" readonly>
        Somme Totale :<input type="text" value="{{ $caisses[0]->som_jr }}" readonly>
        <hr>
        <a href="{{ url('voir_paiement_journalier') }}">Voir les paiement effectuer dans la journée</a>
        <a href="{{ url('fermer_caisse') }}">Fermer la Caisse</a> --}}
@endsection
