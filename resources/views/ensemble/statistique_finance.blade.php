@extends('layouts.app')
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Statistique <small>Finance</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-10 col-sm-8  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sur une(1) Année</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="graph" style="height:350px;"></canvas>
                    {{-- <div id="graph" style="height:350px;"></div> --}}

                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sur un(1) mois</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="" style="height:350px;">
                        <canvas id="graph_1" style="height:350px;"></canvas>
                    </div>

                  </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-4  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dans la semaine</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="" style="height:350px;">
                        <canvas id="graph_2" style="height:350px;"></canvas>
                    </div>

                  </div>
                </div>
              </div>

              
          </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const graph = document.getElementById("graph").getContext("2d");
        let myChart = new Chart(graph, {
            type:"line",
            data:{
                labels:["Janvier", "Février", "Mars","Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre","Novembre", "Décembre"],
            datasets:[
                {
                    label:"Les Paiements effectués en fonction du mois",
                    data:[
                        {{ $diagrame_mois[0]->janv }},
                        {{ $diagrame_mois[0]->fev }},
                        {{ $diagrame_mois[0]->mars }},
                        {{ $diagrame_mois[0]->avril }},
                        {{ $diagrame_mois[0]->mais }},
                        {{ $diagrame_mois[0]->juin }},
                        {{ $diagrame_mois[0]->juil }},
                        {{ $diagrame_mois[0]->aout }},
                        {{ $diagrame_mois[0]->sept }},
                        {{ $diagrame_mois[0]->oct }},
                        {{ $diagrame_mois[0]->nov }},
                        {{ $diagrame_mois[0]->decem }},
                    ],
                    backgroundColor:'grey',
                    hoverBorderWidth: 3,
                },
            ],
            },
            options:{
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                    },
                  
                title:{
                    display:true,
                    text:"",
                    fontSize: 16,
                },
                legend:{
                    display:false,
                },
                layout:{
                    padding:{
                        left: 0,
                        right: 0,
                        top: 0,
                    },
                }
            },
        });
    </script>
    <script>
        const graph_1 = document.getElementById("graph_1").getContext("2d");
        let myChart_1 = new Chart(graph_1, {
            type:"pie",
            data:{
                labels:["Loyer", "CIE", "SODECI","GAZ", "AUTRE"],
            datasets:[
                {
                    label:"Les types de Paiements effectués dans le mois",
                    data:[
                        {{ $get_cercle_mois[0]->loyer }},
                        {{ $get_cercle_mois[0]->cie }},
                        {{ $get_cercle_mois[0]->sodeci }},
                        {{ $get_cercle_mois[0]->gaz }},
                        {{ $get_cercle_mois[0]->propriete }},
                    ],
                    backgroundColor:['red','orange','salmon','blue','yellow'],
                    hoverBorderWidth: 3,
                },
            ],
            },
            options:{
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                    },
                  
                title:{
                    display:true,
                    text:"Type de paiement",
                    fontSize: 16,
                },
                legend:{
                    display:true,
                },
                layout:{
                    padding:{
                        left: 0,
                        right: 0,
                        top: 0,
                    },
                }
            },
        });
    </script>
    <script>
        const graph_2 = document.getElementById("graph_2").getContext("2d");
        let myChart_2 = new Chart(graph_2, {
            type:"bar",
            data:{
                labels:["Loyer", "CIE", "SODECI","GAZ", "AUTRE"],
            datasets:[
                {
                    label:"Les types de Paiements effectués dans le mois",
                    data:[
                        {{ $get_cercle_semaine[0]->loyer }},
                        {{ $get_cercle_semaine[0]->cie }},
                        {{ $get_cercle_semaine[0]->sodeci }},
                        {{ $get_cercle_semaine[0]->gaz }},
                        {{ $get_cercle_semaine[0]->propriete }},
                    ],
                    backgroundColor:['red','orange','salmon','blue','yellow'],
                    hoverBorderWidth: 3,
                },
            ],
            },
            options:{
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                    },
                  
                title:{
                    display:true,
                    text:"Type de paiement",
                    fontSize: 16,
                },
                legend:{
                    display:true,
                },
                layout:{
                    padding:{
                        left: 0,
                        right: 0,
                        top: 0,
                    },
                }
            },
        });
    </script>
        @endsection