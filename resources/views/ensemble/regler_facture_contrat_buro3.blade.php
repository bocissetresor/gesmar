@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Regler Facture</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Veuillez remplir ce formulaire</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="POST" action="{{ url('regler_facture_contrat_buro3_payer/'. $contrats->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Code Contrat:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" value="{{ $contrats->code }}" class='optional' name="code" data-validate-length-range="5,15" type="text" readonly/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nom Locataire:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" value="{{ $contrats->nom_locataire }}" class='optional' name="nom_locataire" data-validate-length-range="5,15" type="text" readonly/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Code Locataire:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" value="{{ $contrats->code_locataire }}" class='optional' name="code_locataire" data-validate-length-range="5,15" type="text" readonly/></div>
                        </div>
                        @foreach ($contrats->emplacements as $contrats->emplacement)
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Denomination Emplacement:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $contrats->emplacement->designation }}" class='optional' name="designation" data-validate-length-range="5,15" type="text" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Code Emplacement:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $contrats->emplacement->code }}" class='optional' name="code" data-validate-length-range="5,15" type="text" readonly/></div>
                            </div>
                        @endforeach
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Loyer :<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" value="{{ $contrats->emplacements->sum('loyer') }}" class='optional' data-validate-length-range="5,15" type="text" readonly/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Pas de Porte :<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" value="{{ $contrats->emplacements->sum('pas_porte') }}" class='optional' data-validate-length-range="5,15" type="text" readonly/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Somme Total Emplacement :<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" value="{{ $contrats->emplacements->sum('loyer')+$contrats->emplacements->sum('pas_porte') }}" class='optional' name="code" data-validate-length-range="5,15" type="text" readonly/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Mode de Paiement: </label>
                            <select name="mode_paiement" id="">
                                <option class="form-control" value="">Choisir</option>
                                <option class="form-control" value="Banque">Banque</option>
                                <option class="form-control" value="Espece">Espece</option>
                            </select><br>
                        </div>
                        <div class="field item form-group">
                            <label  class="col-form-label col-md-3 col-sm-3  label-align">Commenter :</label>
                            <textarea  type="text" name="motif"> </textarea>
                        </div>
                        <hr>
                        <h3 style="margin-left:40%">Information des equipements</h3>
                        <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                            <thead>
                                <tr>
                                <th>Nom Equipement</th>
                                <th>Code Equipement</th>
                                <th>Index Debut</th>
                                <th>Index Fin</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contrats->proprietes as $contrats->propriete)
                                <tr>
                                <td><input type="text" class="form-control" name="" value="{{ $contrats->propriete->denomination }}" readonly/></td>
                                <td><input type="text" class="form-control" name="" value="{{ $contrats->propriete->code }}" readonly/></td>
                                <td><input type="number" class="form-control" name="" value="{{ $contrats->propriete->index_dbt }}"  readonly/></td>
                                <td><input type="number" class="form-control" name="" value="{{ $contrats->propriete->index_fn }}"  readonly/></td>
                                </tr>
                                @endforeach
                                @foreach ($contrats->gazs as $contrats->gaz)
                                <tr>
                                <td><input type="text" class="form-control" name="" value="{{ $contrats->gaz->denomination }}" readonly/></td>
                                <td><input type="text" class="form-control" name="" value="{{ $contrats->gaz->code }}" readonly/></td>
                                <td><input type="number" class="form-control" name="" value="{{ $contrats->gaz->index_dbt }}"  readonly/></td>
                                <td><input type="number" class="form-control" name="" value="{{ $contrats->gaz->index_fn }}"  readonly/></td>
                                </tr>
                                @endforeach
                                @foreach ($contrats->compteur_cies as $contrats->compteur_cie)
                                <tr>
                                <td><input type="text" class="form-control" name="" value="{{ $contrats->compteur_cie->denomination }}" readonly/></td>
                                <td><input type="text" class="form-control" name="" value="{{ $contrats->compteur_cie->code }}" readonly/></td>
                                <td><input type="number" class="form-control" name="" value="{{ $contrats->compteur_cie->index_dbt }}"  readonly/></td>
                                <td><input type="number" class="form-control" name="" value="{{ $contrats->compteur_cie->index_fn }}"  readonly/></td>
                                </tr>
                                @endforeach
                                @foreach ($contrats->compteur_sodecis as $contrats->compteur_sodeci)
                                <tr>
                                <td><input type="text" class="form-control" name="" value="{{ $contrats->compteur_sodeci->denomination }}" readonly/></td>
                                <td><input type="text" class="form-control" name="" value="{{ $contrats->compteur_sodeci->code }}" readonly/></td>
                                <td><input type="number" class="form-control" name="" value="{{ $contrats->compteur_sodeci->index_dbt }}"  readonly/></td>
                                <td><input type="number" class="form-control" name="" value="{{ $contrats->compteur_sodeci->index_fn }}"  readonly/></td>
                                </tr>
                                @endforeach

                            </tbody>

                            </table>
                        <hr>
                        <hr>
                                <h3 style="margin-left:40%"> Information Odonnancement</h3>
                                <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                                <thead>
                                    <tr>
                                    <th>Date</th>
                                    <th>Somme </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contrats->ordonnacement_contrats as $ordonnacement_contrat)
                                    {{-- @if () --}}

                                        <tr>
                                        <td><input type="date" class="form-control variable-field quantity" name="" value="{{ $ordonnacement_contrat->date_ordonnacement }}" readonly/></td>
                                        <td><input type="number" class="form-control variable-field costpriceunit" name="" value="{{ $ordonnacement_contrat->somme_ordonnacement }}" readonly/></td>

                                        </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                </tbody>
                                </table>
                                <hr>

                        <hr>
                        <h3 style="margin-left:40%">Information Totaux</h3>
                        <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                        <thead>
                            <tr>
                            <th>N°</th>
                            <th>Date 1er Ordonna</th>
                            <th>Somme à Payer</th>
                            <th>Somme Payer</th>
                            <th>Somme Restant</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contrats->ordonnacement_contrats as $ordonnacement_contrat)
                            {{-- @if () --}}
                            @if ($ordonnacement_contrat->date_ordonnacement== date('Y-m-d') || $ordonnacement_contrat->date_ordonnacement < date('Y-m-d'))
                            <tr>
                            <td><input type="number" class="form-control variable-field quantity" name="id_ordonnacement" value="{{ $ordonnacement_contrat->id }}"></td>
                            <td><input type="date" class="form-control variable-field quantity" name="date_ordonnacement" value="{{ $ordonnacement_contrat->date_ordonnacement }}" readonly/></td>
                            <td><input type="number" class="form-control variable-field quantity" name="som_restant_ouverture" value="{{ $contrats->som_toto }}" readonly/></td>
                            <td><input type="number" class="form-control variable-field costpriceunit" name="som_payer_ouverture" min="0" value="{{ $ordonnacement_contrat->somme_ordonnacement }}" readonly/></td>
                            <td><input type="number" class="form-control width-80 totalcostprice" name="som_restant_ouverture" readonly /></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        </table>
                        <hr>
                        <div class="ln_solid">
                            <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                    <button type='submit' class="btn btn-primary">VALIDER</button>
                                    <button type='reset' class="btn btn-success">REINITIALISER</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function () {
    $('.variable-field').bind("click", function () {
        var currentTD = $(this).parents('tr').find('td');
        var totalCost = Number(currentTD[2].firstChild.value) - Number(currentTD[3].firstChild.value);
        //The substring is to round the number to 4 decimal places
        currentTD[4].firstChild.value = totalCost.toString().substring(0, totalCost.toString().indexOf(".") + 100);
        //alert(totalCost);
    });
});
</script>

@endsection
                        
                    {{-- <script src="{{ asset('form/js.js') }}"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                </body>
                </html> --}}
