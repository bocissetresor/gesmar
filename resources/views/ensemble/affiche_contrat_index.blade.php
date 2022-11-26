<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
</head>
<body>
    <h2><a href="{{ url('ancien_client') }}">Retour</a></h2>

    <div>

    <table id="example" class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Code Contrat</th>
                <th>Date Debut</th>
                <th>Type</th>
                <th>Code Locataire</th>
                <th>Nom de Locataire</th>
                <th>Adresse Postale</th>
                <th>statut Bureau 1</th>
                <th>statut Bureau 2</th>
                <th>statut Bureau 3</th>
                <th scope="col">Regler index Cie</th>
                <th scope="col">Regler index Sodeci</th>
                <th scope="col">Regler index Gaz</th>
                <th scope="col">Regler index Autre Equipement</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contrats as $contrat)

                <tr>
                    <td>{{ $contrat->code }}</td>
                    <td>{{ $contrat->date_debut }}</td>
                    <td>{{ $contrat->type }}</td>
                    <td>{{ $contrat->code_locataire }}</td>
                    <td>{{ $contrat->nom_locataire }}</td>
                    <td>{{ $contrat->adresse_postale }}</td>
                    <td>{{ $contrat->statut_buro1 }}</td>
                    <td>{{ $contrat->statut_buro2 }}</td>
                    <td>{{ $contrat->statut_buro3 }}</td>
                    <td><a href="{{ url('regler_index_cie', ['id' => $contrat->id]) }}">Regler</a></td>
                    <td><a href="{{ url('paiement_index_sodeci', ['id' => $contrat->id]) }}">Regler</a></td>
                    <td><a href="{{ url('paiement_index_gaz', ['id' => $contrat->id]) }}">Regler</a></td>
                    <td><a href="{{ url('paiement_index_equipement', ['id' => $contrat->id]) }}">Regler</a></td>

                </tr>

        @endforeach
        </tbody>
    </table>


<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

<script src="{{ url('table/jquery-3.5.1.js') }}"></script>

<script src="{{ url('table/jquery.dataTables.min.js') }}"></script>
</body>
</html>
