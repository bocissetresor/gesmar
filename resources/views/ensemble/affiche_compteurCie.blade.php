@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des Compteurs CIE </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('creat_compteurCie') }}" style="color:aliceblue"> Créer Compteur de Cie</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Les Compteurs CIE</h2>
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
                                                      <th scope="col">Code</th>
                                                      <th scope="col">Designation</th>
                                                      <th scope="col">Adresse</th>
                                                      <th scope="col">Index Debut</th>
                                                      <th scope="col">Index Fin</th>
                                                      <th scope="col">Somme Payer</th>
                                                      <th scope="col">Somme Restant</th>
                                                      <th scope="col">Mois Payer</th>
                                                      <th scope="col" style="text-align: center;">Statut</th>
                                                      <th scope="col" style="text-align: center;">Regler</th>
                                                      <th scope="col" style="text-align: center;">Editer</th>
                                                      <th scope="col" style="text-align: center;">Supprimer</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($compteurCies as $compteurCie)

                                                  <tr>
                                                      <td>{{ $compteurCie->code }}</td>
                                                      <td>{{ $compteurCie->denomination }}</td>
                                                      <td>{{ $compteurCie->adresse_gps }}</td>
                                                      <td>{{ $compteurCie->index_dbt }}</td>
                                                      <td>{{ $compteurCie->index_fn }}</td>
                                                      <td>{{ $compteurCie->somme_payer }} Fcfa</td>
                                                      <td>{{ $compteurCie->somme_restant }} Fcfa</td>
                                                      <td>{{ $compteurCie->mois_payer }}</td>
                                                      <td>{{ $compteurCie->statut }}</td>
                                                      @if($compteurCie->statut==1)
                                                        <td style="text-align: center; color:green"><i class="fa fa-check-square-o fa-2x"></i></td>
                                                      @else
                                                        <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                      @endif
                                                      <td style="text-align: center;"><a href="{{ url('regler_index_cie2', ['id' => $compteurCie->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i>Regler</a></td>
                                                      <td style="text-align: center;"><a href="{{ url('edit_compteurCie', ['id' => $compteurCie->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edite</a></td>
                                                      <td style="text-align: center;"><a href="{{ url('destroy_cie', ['id' => $compteurCie->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Supprime</a></td>
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