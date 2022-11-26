@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Regler Loyer</h3>
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
                        <form action="{{ url('paiement_loyer_payer/'. $contrats->id) }}" method="POST">
                            @csrf
                            <div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Code Locataire:<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="{{ $contrats->code }}" class='optional' name="code" data-validate-length-range="5,15" type="text" readonly/></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> Code Locataire :<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="{{ $contrats->code_locataire }}" class='optional' name="code_locataire" data-validate-length-range="5,15" type="text" readonly/></div>
                                </div>


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
                                    @foreach ($contrats->ordonnacement_contrat_loyers as $ordonnacement_contrat_loyer)
                                    <tr>
                                    <td><input type="date" class="form-control variable-field quantity" name="" value="{{ $ordonnacement_contrat_loyer->date_ordonnacement }}" readonly/></td>
                                    <td><input type="number" class="form-control variable-field costpriceunit" name="" value="{{ $ordonnacement_contrat_loyer->somme_ordonnacement }}" readonly/></td>

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
                                        <th>N</th>
                                        <th>Date 1er Ordonna</th>
                                        <th>Somme à Payer</th>
                                        <th>Somme Payer</th>
                                        <th>Somme Restant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contrats->ordonnacement_contrat_loyers as $ordonnacement_contrat_loyer)
                                        {{-- @if () --}}
                                        @if ($ordonnacement_contrat_loyer->date_ordonnacement== date('Y-m-d') || $ordonnacement_contrat_loyer->date_ordonnacement < date('Y-m-d'))
                                        <tr>
                                        <td><input type="number" name="id_ordonnacement" class="form-control variable-field quantity" value="{{ $ordonnacement_contrat_loyer->id }}" ></td>
                                        <td><input type="date" class="form-control variable-field quantity" name="date_ordonnacement" value="{{ $ordonnacement_contrat_loyer->date_ordonnacement }}" readonly/></td>
                                        <td><input type="number" class="form-control variable-field quantity" name="som_restant_ouverture" value="{{ $contrats->som_toto }}" readonly/></td>
                                        <td><input type="number" class="form-control variable-field costpriceunit" name="som_payer_ouverture" min="0" value="{{ $ordonnacement_contrat_loyer->somme_ordonnacement }}" readonly/></td>
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
                                   

