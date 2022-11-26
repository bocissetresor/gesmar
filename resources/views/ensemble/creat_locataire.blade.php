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
                <h3>Creer Locataire</h3>
                <div class="card">
    <form method="POST" action="{{ url('creat_locataire') }}" enctype="multipart/form-data">
        @csrf
        <!-- Code: <input type="text" name="code"> <br> -->
        Nom: <input type="text" name="nom"> <br>
        Denomination: <input type="text" name="denomination"> <br>
        Type: <input type="text" name="type"> <br>
        Adresse Postale: <input type="text" name="adresse_postale"> <br>
        Ville: <input type="text" name="ville"> <br>
        Tel: <input type="text" name="tel"> <br>
        Statut: <input type="text" name="statut"> <br>

        <button type="submit">Créer</button>
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
