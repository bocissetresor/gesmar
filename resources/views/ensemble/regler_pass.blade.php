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
                <h3>Regler Pass</h3>
                <div class="card" style="width: 150%; left: -20%">


                    <form action="{{ url('regler_pass_payer/'. $etales->id) }}" method="POST">
                        @csrf
                        <div>

                            Code : <input type="text" name="code_etale" value="{{ $etales->code }}" readonly><br>
                            Nom Commercial : <input type="text" name="commercial_id" value="{{ $etales->commerciaux_id }}" readonly><br>
                            <hr>
                            <hr>
                            <h3>Information Totaux</h3>
                            <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                            <thead>
                                <tr>
                                <th>N°</th>
                                <th>Date</th>
                                <th>Emplacement</th>
                                <th>superficie</th>
                                <th>Status</th>
                                <th>Somme a Payer</th>
                                <th>Somme Payer</th>
                                <th>Somme Restant</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach ($etales as $etale) --}}
                                <tr>
                                    <td><input type="number" class="form-control variable-field" name="etale_id" value="{{ $etales->id }}" readonly></td>
                                    <td><input type="text" name="date_payer" value="{{ now()}}" readonly></td>
                                    <td><input type="text" class="form-control variable-field " name="designation" value="{{ $etales->designation }}" readonly/></td>
                                    <td><input type="number" class="form-control variable-field " name="superficie" value="{{ $etales->superficie }}" readonly/></td>
                                    <td><input type="number" class="form-control variable-field " name="statut" value="{{ $etales->statut }}" readonly/></td>
                                    <td><input type="number" class="form-control width-80" name="somme_a_payer" value="{{ $etales->pass }}" readonly /></td>
                                    <td><input type="number" class="form-control variable-field costpriceunit" name="somme_payer"/></td>
                                    <td><input type="number" class="form-control width-80 totalcostprice" name="somme_restant" readonly /></td>

                                </tr>


                            {{-- @endforeach --}}

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
