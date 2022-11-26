@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
              <div class="">
                  <div class="page-title">
                      <div class="title_left">
                          <h3>RESUME</h3>
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
                                  <h2></h2>
                                  <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                  </ul>
                                  <div class="clearfix"></div>
                              </div>

                              <div class="x_content">
                                  <div class="row">

                                      <div class="col-md-12">
                                        <form action="{{-- {{ url('/ouverture_caisse_statut') }} --}}" method="POST">
                                          <!-- price element -->
                                          <div class="col-md-3 col-sm-6 " style="position:absolute; top:40%; left:35%">
                                              <div class="pricing">
                                                  <div class="title">
                                                      <h2>ENTRER ACTUELLE:</h2>
                                                      <h1>{{ $get_tva[0]->entrer }} XOF/HT</h1>
                                                  </div>
                                                  <div class="title" style="background-color:red">
                                                    <h2>SORTIR ACTUELLE:</h2>
                                                    <h1>{{ $get_tva[0]->sortir }} XOF/HT</h1>
                                                </div>
                                                  <div class="x_content">
                                                      <div class="">
                                                          <div class="pricing_features">
                                                              <ul class="list-unstyled text-left">
                                                                  <li><i class="fa fa-check text-success"></i> TVA Vente <strong>{{ $get_tva[0]->TVAvente }} </strong></li>
                                                                  <li><i class="fa fa-check text-success"></i> TVA Achat <strong>{{ $get_tva[0]->TVAachat }}</strong></li>
                                                                  <li><i class="fa fa-check text-success"></i> Rapport = <strong style='color:green'>{{ $get_tva[0]->rapport }}</strong></li>
                                                              </ul>
                                                              <hr>
                                                              <li class="text-danger"> NB:
                                                                  <h4>HP: Hors Taxe
                                                                    <br>TVA:Taxe sur la valeur ajoutée
                                                                    <br>TVA en Côte d'Ivoire est 18%
                                                                    Merci! </h4>
                                                              </li>

                                                          </div>
                                                      </div>
                                                      <div class="pricing_footer">
                                                          <a href="{{ url('liste_paiement') }}" type="submit" class="btn btn-success btn-block" role="button">CONFIRMER</a>
            
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
@endsection