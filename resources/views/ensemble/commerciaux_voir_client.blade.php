@extends('layouts.app')
@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>L'ensemble des commerciaux </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                    <span class="input-group-btn">
                                      <button class="btn btn-secondary" type="button"  ><a href="{{ url('creat_commerciaux') }}" style="color:aliceblue"> Creer commerciaux</a></button>
                                      
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Les commerciaux</h2>
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
                                                      <th scope="col">Nom</th>
                                                      <th scope="col">Designation</th>
                                                      <th scope="col">ville</th>
                                                      <th scope="col">Tel</th>
                                                      <th scope="col" style="text-align: center;">Status</th>
                                                      <th scope="col" style="text-align: center;">Voir Client</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($commerciauxs as $commerciaux)

                                                  <tr>
                                                      <td>{{ $commerciaux->code }}</td>
                                                      <td>{{ $commerciaux->nom }}</td>
                                                      <td>{{ $commerciaux->denomination }}</td>
                                                      <td>{{ $commerciaux->ville }}</td>
                                                      <td>{{ $commerciaux->tel }}</td>
                                                      @if($commerciaux->statut==1)
                                                            <td style="text-align: center;"><a href="{{ url('desactiver_commerciaux', ['id' => $commerciaux->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-check-square-o"></i>Desactiver</a></td>
                                                        @else
                                                            <td style="text-align: center;"><a href="{{ url('activer_commerciaux', ['id' => $commerciaux->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-close"></i>Activer</a></td>
                                                        @endif
                                                      <td style="text-align: center;"><a href="{{ url('commerciaux_voir_emplacement', ['id' => $commerciaux->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Voir</a></td>
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