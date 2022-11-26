<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
</head>
<body>
    {{-- <a href="{{ url('creer_commerciaux') }}">Créer Commerciaux</a> --}}
<table id="example" class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
        <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Designation</th>
                    <th scope="col">superficie</th>
                    <th scope="col">Montant a payer</th>
                    <th scope="col">Faire paiement</th>
                    <th scope="col">statut</th>
                </tr>
            </thead>
            <tbody>
            @foreach($etales as $etale)

                <tr>
                    <td>{{ $etale->code }}</td>
                    <td>{{ $etale->Designation }}</td>
                    <td>{{ $etale->superficie }}</td>
                    <td>{{ $etale->pass }} Fcfa</td>
                    <td><a href="{{ url('regler_pass', ['id' => $etale->id]) }}">Regler</a></td>
                    <td>{{ $etale->statut }} </td>

                </tr>
            @endforeach
            </tbody>
    </table>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
        <script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
        <script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
        <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
        <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
        <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
        <script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
        <script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
        <script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
        <script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script>
<script>
$(document).ready(function() {

  $('#example').DataTable(
    {
      "dom": '<"dt-buttons"Bf><"clear">lirtp',
      "paging": false,
      "autoWidth": true,
      "columnDefs": [
        { "orderable": false, "targets": 5 }
      ],
      "buttons": [
        'colvis',
        'copyHtml5',
        'excelHtml5',
        'print'
      ]
    }
  );
  //Add row button
  $('.dt-add').each(function () {
    $(this).on('click', function(evt){
      //Create some data and insert it
      var rowData = [];
      var table = $('#example').DataTable();
      //Store next row number in array
      var info = table.page.info();
      rowData.push(info.recordsTotal+1);
      //Some description
      rowData.push('New Order');
      //Random date
      var date1 = new Date(2016,01,01);
      var date2 = new Date(2018,12,31);
      var rndDate = new Date(+date1 + Math.random() * (date2 - date1));//.toLocaleDateString();
      rowData.push(rndDate.getFullYear()+'/'+(rndDate.getMonth()+1)+'/'+rndDate.getDate());
      //Status column
      rowData.push('NEW');
      //Amount column
      rowData.push(Math.floor(Math.random() * 2000) + 1);
      //Inserting the buttons ???
      rowData.push('<button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button><button type="button" class="btn btn-danger btn-xs dt-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>');
      //Looping over columns is possible
      //var colCount = table.columns()[0].length;
      //for(var i=0; i < colCount; i++){      }

      //INSERT THE ROW
      table.row.add(rowData).draw( false );
    });
  });
  //Edit row buttons
  $('.dt-edit').each(function () {
    $(this).on('click', function(evt){
      $this = $(this);
      var dtRow = $this.parents('tr');
      $('div.modal-body').innerHTML='';
      $('div.modal-body').append('Row index: '+dtRow[0].rowIndex+'<br/>');
      $('div.modal-body').append('Number of columns: '+dtRow[0].cells.length+'<br/>');
      for(var i=0; i < dtRow[0].cells.length; i++){
        $('div.modal-body').append('Cell (column, row) '+dtRow[0].cells[i]._DT_CellIndex.column+', '+dtRow[0].cells[i]._DT_CellIndex.row+' => innerHTML : '+dtRow[0].cells[i].innerHTML+'<br/>');
      }
      $('#myModal').modal('show');
    });
  });
  //Delete buttons
  $('.dt-delete').each(function () {
    $(this).on('click', function(evt){
      $this = $(this);
      var dtRow = $this.parents('tr');
      if(confirm("Are you sure to delete this row?")){
        var table = $('#example').DataTable();
        table.row(dtRow[0].rowIndex-1).remove().draw( false );
      }
    });
  });
  $('#myModal').on('hidden.bs.modal', function (evt) {
    $('.modal .modal-body').empty();
  });
});
</script>
</body>
</html>
