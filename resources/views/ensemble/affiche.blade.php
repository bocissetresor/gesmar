@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des Sites </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('creat_site') }}" style="color:aliceblue"> Creation de Site</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Les Sites</h2>
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
                                                        <th scope="col">Nom Site</th>
                                                        <th scope="col">Adresse</th>
                                                        <th scope="col">BP</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Ville</th>
                                                        <th scope="col">Commune</th>
                                                        <th scope="col">Affiche Batiment</th>
                                                        <th scope="col">Editer</th>
                                                        <th scope="col">Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($sites as $site)

                                                    <tr>
                                                        <td>{{ $site->code }}</td>
                                                        <td>{{ $site->designation }}</td>
                                                        <td>{{ $site->adresse_graphique }}</td>
                                                        <td>{{ $site->adresse_postale }}</td>
                                                        <td>{{ $site->type }}</td>
                                                        <td>{{ $site->ville }}</td>
                                                        <td>{{ $site->commune }}</td>
                                                        <td style="text-align: center;"><a href="{{ url('affiche_batiment', ['id' => $site->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>Voir</a></td>
                                                        <td style="text-align: center;"><a href="{{ url('edit_site', ['id' => $site->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edite</a></td>
                                                        <td style="text-align: center;"><a href="{{ url('supprimer_site', ['id' => $site->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Supprime</a></td>
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