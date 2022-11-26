@extends('layouts.app')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Loyer GAZ Ordonnés </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button"  ><a href="{{ url('ancien_client') }}" style="color:aliceblue"> Retour</a></button>
                          
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>GAZ</h2>
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
                                          <th scope="col">Mois Payer</th>
                                          <th scope="col">Payer</th>
                                          <th scope="col">Statuts</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($proprietes as $propriete)
                                  @foreach ($propriete->ordonnacement_proprietes as $ordonnacement_propriete)
                                  @if ($ordonnacement_propriete->statut==0)

                                      <tr>
                                          <td>{{ $propriete->code }}</td>
                                          <td>{{ $propriete->denomination }}</td>
                                          <td>{{ $propriete->adresse_gps }}</td>
                                          <td>{{ $propriete->index_dbt }}</td>
                                          <td>{{ $propriete->index_fn }}</td>
                                          <td>{{ $propriete->mois_payer }}</td>
                                          {{-- <td><a href="{{ url('paiement_index_equipement', ['id' => $propriete->id]) }}">Regler</a></td> --}}

                                          @if ($ordonnacement_propriete->date_ordonnacement < date('Y-m-d'))
                                                  <td style="text-align: center;"><a href="{{ url('paiement_index_equipement', ['id' => $propriete->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-money"></i>Regler</a></td>
                                                  <td style="text-align: center;"><a href="" class="btn btn-warning btn-xs" style="pointer-events: none; cursor: default;"><i class="fa fa-check-square-o"></i>En Retart</a></td>
                                              @endif
                                              @if ($ordonnacement_propriete->date_ordonnacement == date('Y-m-d'))
                                                      <td style="text-align: center;"><a href="{{ url('paiement_index_equipement', ['id' => $propriete->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-money"></i>Regler</a></td>
                                                      <td style="text-align: center;"><a href="" class="btn btn-success btn-xs" style="pointer-events: none; cursor: default;"><i class="fa fa-check-square-o"></i>A jour</a></td>
                                              @endif
                                              @if ($ordonnacement_propriete->date_ordonnacement > date('Y-m-d'))
                                              <td  style="text-align: center;"><a href="" class="btn btn-danger btn-xs" style="pointer-events: none; cursor: default;"><i class="fa fa-close"></i>Imposible</a></td>
                                                  <td style="text-align: center; color:red">La date n'est pas encore arrivé</td>
                                                  @endif
                                      </tr>
                                      @endif

                                      @endforeach
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