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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="{{ asset('pdf/script.js') }}"></script>
</head>
<body>
    <div id="pdf">
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>FERMERTURE CAISSE : {{ date("Y-m-d H:i:s") }}</h3>
                <div class="card">

        <form action="{{ url('fermer_caisse_regler/') }}" method="POST">
            @csrf

            <div>

                <hr>

                <h3>Information Caisse</h3>
                <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                    <thead>
                        <tr>
                        <th>Date</th>
                        <th>Somme Total</th>
                        <th>Somme Deposer</th>
                        <th>Somme Restant</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                        <td><input type="date" class="form-control variable-field quantity" name="date_heure_fermeture" value="{{ date("Y-m-d") }}" readonly/></td>
                        <td><input type="number" class="form-control variable-field quantity" name="" value="{{ $caisses->somme_total_paiement_effectuer }}" readonly/></td>
                        <td><input type="number" class="form-control variable-field costpriceunit" name="somme_fermerture" min="0" max="{{ $caisses->somme_total_paiement_effectuer }}"/></td>
                        <td><input type="number" class="form-control width-80 totalcostprice" name="somme_total_paiement_effectuer" readonly /></td>
                        </tr>

                    </tbody>
                    </table>
                    <hr>
            </div>
                    <button type="submit">Créer</button><br>
                </div>
            </div>
            </div>
            </div>

                </form>
                <script>
                    $(document).ready(function () {
                        $('.variable-field').bind("change", function () {
                            var currentTD = $(this).parents('tr').find('td');
                            var totalCost = Number(currentTD[1].firstChild.value) - Number(currentTD[2].firstChild.value);
                            //The substring is to round the number to 4 decimal places
                            currentTD[3].firstChild.value = totalCost.toString().substring(0, totalCost.toString().indexOf(".") + 100);
                            //alert(totalCost);
                        });
                    });
                </script>
    <script src="{{ asset('form/js.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>
