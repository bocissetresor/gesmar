<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('form/css.css') }}">
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Editer Gaz</h3>
                <div class="card">

    <form method="POST" action="{{ url('update_gaz/'. $gaz->id) }}" enctype="multipart/form-data">
        @csrf
        <!-- Code: <input type="text" name="code"> <br> -->
        Designation: <input type="text" name="denomination" value="{{ $gaz->denomination }}" required> <br>
        adresse_gps: <input type="text" name="adresse_gps" value="{{ $gaz->adresse_gps }}"> <br>
        Index Debut: <input type="number" min="0" name="index_dbt" value="{{ $gaz->index_dbt }}"> <br>
        Index Fin: <input type="number" min="0" name="index_fn" value="{{ $gaz->index_fn }}"> <br>
        Somme à Payer: <input type="number" name="som_total" value="{{ $gaz->som_total }}" readonly> <br>
        Unite Index: <input type="number" min="0" name="unite_index" value="{{ $gaz->unite_index }}" required> <br>
        statut: <input type="text" name="statut" value="{{ $gaz->statut }}"> <br>
        Libelle: <input type="text" name="libelle" value="{{ $gaz->libelle }}"> <br>
        <button type="submit">Modifier</button><br>
    </div>
</div>
</div>
</div>

</form>

<script src="{{ asset('form/js.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>
