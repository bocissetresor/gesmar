@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des Equipements </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('creat_propriete') }}" style="color:aliceblue"> Créer Compteur Equipement</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Les Equipements</h2>
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
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Regler</th>
                                                        <th scope="col">Editer</th>
                                                        <th scope="col">Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($proprietes as $propriete)

                                                    <tr>
                                                        <td>{{ $propriete->code }}</td>
                                                        <td>{{ $propriete->denomination }}</td>
                                                        <td>{{ $propriete->adresse_gps }}</td>
                                                        <td>{{ $propriete->index_dbt }}</td>
                                                        <td>{{ $propriete->index_fn }}</td>
                                                        <td>{{ $propriete->somme_payer }} Fcfa</td>
                                                        <td>{{ $propriete->somme_restant }} Fcfa</td>
                                                        <td>{{ $propriete->mois_payer }}</td>
                                                        @if($propriete->statut==1)
                                                          <td style="text-align: center; color:green"><i class="fa fa-check-square-o fa-2x"></i></td>
                                                        @else
                                                          <td style="text-align: center;color:red"><i class="fa fa-close fa-2x"></i></td>
                                                        @endif
                                                        <td><a href="{{ url('regler_index_equipement', ['id' => $propriete->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i>Regler</a></td>
                                                        <td><a href="{{ url('edit_propriete', ['id' => $propriete->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edite</a></td>
                                                        <td><a href="{{ url('destroy_equipement', ['id' => $propriete->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Supprime</a></td>
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
