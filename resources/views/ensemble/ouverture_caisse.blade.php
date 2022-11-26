@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
              <div class="">
                  <div class="page-title">
                      <div class="title_left">
                          <h3>CONFIRMATION</h3>
                      </div>

                      <div class="title_right">
                          <div class="col-md-5 col-sm-5   form-group pull-right top_search">

                          </div>
                      </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="row">
                      <div class="col-md-12 col-sm-12  ">
                          <div class="x_panel" style="height:600px;">
                              <div class="x_title">
                                  <h2>Somme a l'ouverture de la Caisse</h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                  </ul>
                                  <div class="clearfix"></div>
                              </div>

                              <div class="x_content">
                                  <div class="row">

                                      <div class="col-md-12">
                                        <form action="{{ url('/ouverture_caisse_statut') }}" method="POST">
                                          <!-- price element -->
                                          <div class="col-md-3 col-sm-6 " style="position:absolute; top:40%; left:35%">
                                              <div class="pricing">
                                                  <div class="title">
                                                      <h2>Somme actuelle:</h2>
                                                      <h1>{{ $caisses->somme_ouverture }} XOF</h1>
                                                  </div>
                                                  <div class="x_content">
                                                      <div class="">
                                                          <div class="pricing_features">
                                                              <ul class="list-unstyled text-left">
                                                                  <li><i class="fa fa-check text-success"></i> Heure Ouverture <strong>7h:10 </strong></li>
                                                                  <li><i class="fa fa-check text-success"></i> Heure Fermeture <strong>17h:05</strong></li>
                                                                  <li><i class="fa fa-check text-success"></i> La Somme declarée a la fermeture </li>
                                                              </ul>
                                                              <hr>
                                                              <li class="text-danger"> NB:
                                                                  <h4>Si vous n'êtes pas d'accord avec l'une de ces phrase, veuillez contacter votre superieur, <br> Merci! </h4>
                                                              </li>

                                                          </div>
                                                      </div>
                                                      <div class="pricing_footer">
                                                          <a href="{{ url('liste_paiement') }}" type="submit" class="btn btn-success btn-block" role="button">CONFIRMER</a>
                                                          {{-- <button type="submit"><a href="" class="btn btn-primary">Ouverture de Compte</a></button> --}}

                                                          <a href="{{ url('liste_paiement') }}" class="btn btn-primary btn-block" role="button">CONTINUER</a>
                                                          <p>
                                                              <a href="{{ url('http://127.0.0.1:8000/') }}">Retour</a>
                                                          </p>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- price element -->
                                        </form>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /page content -->



    
    {{-- <div class="card">
        <div class="card-header">
          CONFIRMATION
        </div>
        <div class="card-body">
          <h5 class="card-title">Somme a l'ouverture est: <h4>{{ $caisses->somme_ouverture }} FCFA</h4></h5>
          <p class="card-text">Si vous êtes d'accords avec la sommes a l'ouverture cliquer sinon, faites une reclamation .</p>
          <button type="submit"><a href="{{ url('liste_paiement') }}" class="btn btn-primary">Ouverture de Compte</a></button>
        </div>
    </div> --}}
    
@endsection