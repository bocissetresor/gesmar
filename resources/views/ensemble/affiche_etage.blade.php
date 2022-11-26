@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des Etages </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('creat_etage', ['id' => $batiments->id]) }}" style="color:aliceblue"> Creation d'Etage</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>{{ $batiments->designation }}</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">>
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Nom Etage</th>

                                                        <th>Affiche Zone</th>

                                                        <th>Editer</th>
                                                        <th>Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($etages as $etage)

                                                    <tr>
                                                        <td>{{ $etage->code }}</td>
                                                        <td>{{ $etage->designation }}</td>

                                                        <td><a href="{{ url('affiche_zone', ['id' => $etage->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i>Voir</a></td>
                                                        <td><a href="{{ url('edit_etage', ['id' => $etage->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edite</a></td>
                                                        <td><a href="{{ url('supprimer_etage', ['id' => $etage->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Supprime</a></td>
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