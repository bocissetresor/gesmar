@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Création de Locataire</h3>
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
                   <form action="{{ url('regler_index_cie_payer2/'. $compteurCies->id) }}" method="POST">
                        @csrf
                        <div>

                            {{-- Code Contrat: <input type="text" name="code_contrat" value="{{ $contrats->code }}" readonly><br>
                            Code Locataire : <input type="text" name="code_locataire" value="{{ $contrats->code_locataire }}" readonly><br> --}}

                            <hr>
                            <h3>Information Totaux</h3>
                            <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                            <thead>
                                <tr>
                                <th>Mois</th>
                                <th>Index Debut</th>
                                <th>Index Fin</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td><input type="date" name="mois_payer" value="{{ $compteurCies->mois_payer }}" required></td>
                                    <td><input type="number" class="form-control variable-field " name="index_dbt" min="{{ 1-1 }}" value="{{ $compteurCies->index_dbt }}" required/></td>
                                    <td><input type="number" class="form-control variable-field " name="index_fn" min="{{ 1-1 }}" value="{{ $compteurCies->index_fn }}" required/></td>
                                </tr>

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
            $('.variable-field').bind("change", function () {
                var currentTD = $(this).parents('tr').find('td');
                var totalCost = Number(currentTD[5].firstChild.value) - Number(currentTD[6].firstChild.value);
                //The substring is to round the number to 4 decimal places
                currentTD[7].firstChild.value = totalCost.toString().substring(0, totalCost.toString().indexOf(".") + 100);
                //alert(totalCost);
            });
        });
    </script>

@endsection