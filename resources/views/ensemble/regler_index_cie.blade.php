<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('form/css.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Regler Index</h3>
                <div class="card" style="width: 150%; left: -20%">


                    <form action="{{ url('regler_index_cie_payer/'. $contrats->id) }}" method="POST">
                        @csrf
                        <div>

                            Code Contrat: <input type="text" name="code_contrat" value="{{ $contrats->code }}" readonly><br>
                            Code Locataire : <input type="text" name="code_locataire" value="{{ $contrats->code_locataire }}" readonly><br>
                            <hr>
                            <h3>Information Totaux</h3>
                            <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                            <thead>
                                <tr>
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

                                <tr>
                                    @foreach ($contrats->compteur_cies as $compteur_cie)
                                    {{ $compteur_cie->mois_payer }}
                                    <td><input type="date" class="form-control variable-field " name="mois_payer" valeur="{{ $compteur_cie->mois_payer }}" readonly></td>
                                    <td><input type="number" class="form-control variable-field " name="index_dbt" value="{{ $compteur_cie->index_dbt }}" readonly/></td>
                                    <td><input type="number" class="form-control variable-field " name="index_fn" value="{{ $compteur_cie->index_fn }}" readonly/></td>
                                    <td><input type="number" class="form-control width-80" name="somme_a_payer" value="{{ ($compteur_cie->index_fn - $compteur_cie->index_dbt)*1022 }}" readonly /></td>
                                    <td><input type="number" class="form-control width-80 " value="{{ $compteur_cie->somme_restant }}" readonly /></td>
                                    <td><input type="number" class="form-control variable-field quantity" value="{{ (($compteur_cie->index_fn - $compteur_cie->index_dbt)*1022 + $compteur_cie->somme_restant) }}" readonly /></td>
                                    <td><input type="number" class="form-control variable-field costpriceunit" name="somme_payer" /></td>
                                    <td><input type="number" class="form-control width-80 totalcostprice" name="somme_restant" readonly /></td>

                                    @endforeach

                                </tr>

                            </tbody>

                            </table>
                            <hr>
                            <button type="submit">Regler</button><br>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/doc/scripts.bundle.js"></script>
        <script src="/doc/plugins.bundle.js"></script>
        <script src="/doc/prismjs.bundle.js"></script>
        <script type="text/javascript">

<script src="{{ asset('form/js.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
    <script src="{{ asset('form/js.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>
