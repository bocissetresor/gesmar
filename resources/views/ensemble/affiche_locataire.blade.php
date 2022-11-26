<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="{{ url('table/jquery.dataTables.min.css') }}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Affiche Locataire</title>
</head>
<body>
    <h3><a href="{{ url("creat_locataire") }}">Créer un Locataire</a></h3>
    <style>
        div.container {
            width: 80%;
        }
    </style>

<table id="example" class="display dataTable" style="width:100%">
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom Locataire</th>
                <th>Denomination</th>
                <th>Type</th>
                <th>Adresse Postale</th>
                <th>Ville</th>
                <th>Tel</th>
                <th>Statut</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
        @foreach($locataires as $locataire)

            <tr>
                <td>{{ $locataire->code }}</td>
                <td>{{ $locataire->nom }}</td>
                <td>{{ $locataire->denomination }}</td>
                <td>{{ $locataire->type }}</td>
                <td>{{ $locataire->adresse_postale }}</td>
                <td>{{ $locataire->ville }}</td>
                <td>{{ $locataire->tel }}</td>
                <td>{{ $locataire->statut }}</td>
                <td><a href="{{ url('edit_locataire', ['id' => $locataire->id]) }}">Editer</a></td>
                <td><a href="{{ url('supprimer_locataire', ['id' => $locataire->id]) }}">Supprimer</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <script src="{{ url('table/jquery-3.5.1.js') }}"></script>

    <script src="{{ url('table/jquery.dataTables.min.js') }}"></script>
</body>
</html>
