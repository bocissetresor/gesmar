<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home||Gesmar</title>
    <!--

    Template 2108 Dashboard

    http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="{{ asset('templates/css/fontawesome.min.css') }}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{ asset('templates/css/fullcalendar.min.css') }}">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="{{ asset('templates/css/bootstrap.min.css') }}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{ asset('templates/css/tooplate.css') }}">


    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
</head>


<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="index.html">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Reports
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Daily Report</a>
                                        <a class="dropdown-item" href="#">Weekly Report</a>
                                        <a class="dropdown-item" href="#">Yearly Report</a>
                                    </div>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="products.html">Products</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="accounts.html">Accounts</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Settings
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="#">Billing</a>
                                        <a class="dropdown-item" href="#">Customize</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link d-flex" href="login.html">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Products</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="{{ url('creat_locataire') }}" class="btn btn-small btn-primary">Créé Locataire</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <h1>Locataire</h1>
        <table id="example" class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
        <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Nom Locataire</th>
                    <th scope="col">Denomination</th>
                    <th scope="col">Type</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Editer</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            @foreach($nouveau_clients as $nouveau_client)

                <tr>
                    <td>{{ $nouveau_client->code }}</td>
                    <td>{{ $nouveau_client->nom }}</td>
                    <td>{{ $nouveau_client->denomination }}</td>
                    <td>{{ $nouveau_client->type }}</td>
                    <td>{{ $nouveau_client->adresse_postale }}</td>
                    <td>{{ $nouveau_client->ville }}</td>
                    <td>{{ $nouveau_client->tel }}</td>
                    <td><a href="{{ url('edit_nouveau_client', ['id' => $nouveau_client->id]) }}">Editer</a></td>
                    <td><a href="{{ url('supprimer_nouveau_client', ['id' => $nouveau_client->id]) }}">Supprimer</a></td>
                </tr>
            @endforeach
            </tbody>
    </table>                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                                <button class="btn btn-danger">Delete Selected Items</button>
                            </div>
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018. Created by
                        <a href="http://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a> |  Distributed by <a href="https://themewagon.com" class="text-white tm-footer-link">ThemeWagon</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('.tm-product-name').on('click', function () {
                window.location.href = "edit-product.html";
            });
        })
    </script>
</body>

</html>">
 <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('.tm-product-name').on('click', function () {
                window.location.href = "edit-product.html";
            });
        })
    </script>




<script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>




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
