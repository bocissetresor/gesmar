@extends('layouts.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Les Compteurs de CIE</h3>
                </div>
 
                {{-- <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                            <span class="input-group-btn">
                              <button class="btn btn-secondary" type="button"  ><a href="{{ url('nouveau_client') }}" style="color:aliceblue"> Creer Locataire</a></button>
                              
                            </span>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Les Competeurs de CIE</h2>
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
                                                <th>Code Compteur</th>
                                                <th>Code Contrat</th>
                                                <th>Designation</th>
                                                <th>Index Debut</th>
                                                <th>Index Fin</th>
                                                <th>Mois a Payer</th>
                                                <th>Statut Ordonnacement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($compteurCies as $compteurCie)
                                       {{-- @foreach ($compteurCie->Compteur_Cies as $Compteur_Cie) --}}
                                        @if ($compteurCie->statut ==1 && $compteurCie->statut_ordonnacement==0)

                                            @endif
                                                <tr>
                                                    <td>{{ $compteurCie->code_compteur }}</td>
                                                    <td>{{ $compteurCie->code_contrat }}</td>
                                                    <td>{{ $compteurCie->denomination }}</td>
                                                    <td>{{ $compteurCie->index_dbt }}</td>
                                                    <td>{{ $compteurCie->index_fn }}</td>
                                                    @if ($compteurCie->index_fn==0)
                                                        <td style="text-align: center;"><a href="{{ url('ordonnacement_cie_page', ['id' => $compteurCie->id]) }}"class="btn btn-danger btn-xs" style="pointer-events: none;cursor: default;"><i class="fa fa-close"></i> En Attend </a></td>
                                                    @else
                                                        <td style="text-align: center;">{{ $compteurCie->date }}</td>
                                                    @endif
                                                    @if ($compteurCie->index_fn==0)
                                                        <td style="text-align: center;"><a href="{{ url('ordonnacement_cie_page', ['id' => $compteurCie->id]) }}"class="btn btn-danger btn-xs" style="pointer-events: none;cursor: default;"><i class="fa fa-close"></i> Ordonner </a></td>
                                                    @else
                                                        <td style="text-align: center;"><a href="{{ url('ordonnacement_cie_page', ['id' => $compteurCie->id]) }}"class="btn btn-warning btn-xs"><i class="fa fa-sort-amount-desc"></i> Ordonner </a></td>
                                                    @endif

                                                    {{-- <td><a href="{{ url('edit_contrat', ['id' => $contrat->id]) }}">Editer</a></td>
                                                    <td><a href="{{ url('supprimer_contrat', ['id' => $contrat->id]) }}">Supprimer</a></td> --}}
                                                </tr>
                                                @endforeach
                                       {{--  @endforeach --}}
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