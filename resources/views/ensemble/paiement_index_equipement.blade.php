@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Regler Index</h3>
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
                    <form action="{{ url('paiement_index_equipement_payer/'. $proprietes->id) }}" method="POST">
                        @csrf
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Code Compteur Autre Equipement:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" value="{{ $proprietes->code }}" class='optional' name="" data-validate-length-range="5,15" type="text" readonly/></div>
                        </div>

                            {{-- Code Locataire : <input type="text" name="code_locataire" value="{{ $proprietes->contrat->code_locataire }}" readonly><br> --}}

                            <hr>
                            <h3 style="margin-left: 40%">Information Odonnacement</h3>
                            <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                            <thead>
                                <tr>
                                <th>Date</th>
                                <th>Somme </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proprietes->ordonnacement_proprietes as $ordonnacement_propriete)
                                <tr>
                                <td><input type="date" class="form-control variable-field quantity" name="" value="{{ $ordonnacement_propriete->date_ordonnacement }}" readonly/></td>
                                <td><input type="number" class="form-control variable-field costpriceunit" name="" value="{{ $ordonnacement_propriete->somme_ordonnacement }}" readonly/></td>

                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <hr>
                            <hr>
                            <h3 style="margin-left: 40%">Information Totaux</h3>
                            <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                            <thead>
                                <tr>
                                <th>N°</th>
                                <th>Mois</th>
                                <th>Index Debut</th>
                                <th>Index Fin</th>
                                <th>Somme a Payer</th>
                                <th>Credit</th>
                                <th>Somme Totaux a Payer</th>
                                <th>Somme Payer</th>
                                <th>Somme Restant</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($proprietes->ordonnacement_proprietes as $ordonnacement_propriete)
                                    @if ($ordonnacement_propriete->date_ordonnacement== date('Y-m-d') || $ordonnacement_propriete->date_ordonnacement < date('Y-m-d'))

                                        @if ( ($proprietes->index_fn - $proprietes->index_dbt)*1022  > 0)

                                <tr>
                                    <td><input type="number" class="form-control variable-field" name="id_ordonnacement" value="{{ $ordonnacement_propriete->id }}" readonly></td>
                                    <td><input type="date" name="mois_payer" value="{{ $proprietes->mois_payer }}" readonly></td>
                                    <td><input type="number" class="form-control variable-field " name="index_dbt" value="{{ $proprietes->index_dbt }}" readonly/></td>
                                    <td><input type="number" class="form-control variable-field " name="index_fn" value="{{ $proprietes->index_fn }}" readonly/></td>
                                    <td><input type="number" class="form-control width-80" name="somme_a_payer" value="{{ ($proprietes->index_fn - $proprietes->index_dbt)*1022 }}" readonly /></td>
                                    <td><input type="number" class="form-control width-80 " value="{{ $proprietes->somme_restant }}" readonly /></td>
                                    <td><input type="number" class="form-control variable-field quantity" value="{{ (($proprietes->index_fn - $proprietes->index_dbt)*1022 + $proprietes->somme_restant) }}" readonly /></td>
                                    <td><input type="number" class="form-control variable-field costpriceunit" name="somme_payer" value="{{ $ordonnacement_propriete->somme_ordonnacement }}" readonly/></td>
                                    <td><input type="number" class="form-control width-80 totalcostprice" name="somme_restant" readonly /></td>

                                </tr>
                                @endif

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
            //When there are changes in the input fields of the 1st or 2nd column we calculate the totalCost
            $('.variable-field').bind("click", function () {
                var currentTD = $(this).parents('tr').find('td');
                var totalCost = Number(currentTD[6].firstChild.value) - Number(currentTD[7].firstChild.value);
                //The substring is to round the number to 4 decimal places
                currentTD[8].firstChild.value = totalCost.toString().substring(0, totalCost.toString().indexOf(".") + 100);
                //alert(totalCost);
            });
        });
</script> 
@endsection
