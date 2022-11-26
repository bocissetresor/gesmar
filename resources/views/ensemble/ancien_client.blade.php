@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des Locataires </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('nouveau_client') }}" style="color:aliceblue"> Creer Locataire</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Les Locataires</h2>
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
                                                        <th>Code</th>
                                                        <th>Nom</th>
                                                        <th>Denomination</th>
                                                        <th>Type</th>
                                                        <th>Adresse</th>
                                                        <th>Ville</th>
                                                        <th>Tel</th>
                                                        <th>Status</th>
                                                        <th>Demander Contrat</th>
                                                        <th>Voir mes Contrats</th>
                                                        <th>Editer</th>
                                                        <th>Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($locataires as $locataire)

                                                    <tr>
                                                        <td>{{ $locataire->code }}</td>
                                                        <td>{{ $locataire->nom }}</td>
                                                        <td>{{ $locataire->denomination }}</td>
                                                        <td>{{ $locataire->type }}</td>
                                                        <td>{{ $locataire->adresse_postale }}</td>
                                                        <td>{{ $locataire->ville }}</td>
                                                        <td>{{ $locataire->tel }}</td>
                                                        @if($locataire->statut==1)
                                                            <td style="text-align: center;"><a href="{{ url('desactiver_locataire', ['id' => $locataire->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-check-square-o"></i>Desactiver</a></td>
                                                        @else
                                                            <td style="text-align: center;"><a href="{{ url('activer_locataire', ['id' => $locataire->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-close"></i>Activer</a></td>
                                                        @endif
                                                        <td style="text-align: center;"><a href="{{ url('formulaire_contrat', ['code' => $locataire->code]) }}" class="btn btn-primary btn-xs"><i class="fa fa-file-text"></i> Demande </a></td>
                                                        <td style="text-align: center;"><a href="{{ url('voir_contrat', ['id' => $locataire->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>Voir</a></td>
                                                        <td style="text-align: center;"><a href="{{ url('edit_locataire', ['id' => $locataire->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edite</a></td>
                                                        <td style="text-align: center;"><a href="{{ url('supprimer_locataire', ['id' => $locataire->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Supprime</a></td>
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