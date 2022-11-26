@extends('layouts.app')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row" style="display: inline-block;">
                <div class="top_tiles">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                            <div class="count">{{ $dashboard[0]->nbr_emplacement }}</div>
                            <h3>Nombre d'emplacement</h3>
                            <p>Nombre total d'emplacement</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-comments-o"></i></div>
                            <div class="count">{{ $dashboard[0]->nbr_locataire }}</div>
                            <h3>Nombre de locataire</h3>
                            <p>Nombre total de locataire</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                            <div class="count">{{ $dashboard[0]->nbr_emplacement_non }}</div>
                            <h3>Nombre d'emplacement libre</h3>
                            <p>Nombre total d'emplacement libre</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-check-square-o"></i></div>
                            <div class="count">{{ $dashboard[0]->nbr_emplacement_occup }}</div>
                            <h3>Nombre d'emplacement occupé</h3>
                            <p>Nombre total d'emplacement occupé</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                récapitulatif des transactions<small>Progression annuaire</small></h2>
                            {{-- <div class="filter">
                                <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                    <i class="glyphicon glyphicon-calendar "></i>
                                    <span>Septembre 01, 2022 - Janvier 28, 2022</span> <b class="caret"></b>
                                </div>
                            </div> --}}
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-8 col-sm-12 ">
                                <div class="demo-container" style="height:280px">
                                    <div class="demo-placeholder"><canvas id="graph">

                                    </canvas></div>
                                    
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 ">
                                <div>
                                    <div class="x_title">
                                        <h2>Autres</h2>
                                        <ul class="nav navbar-right panel_toolbox"></ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <ul class="list-unstyled top_profiles scroll-view">
                                        <li class="media event">
                                            <a class="pull-left border-aero profile_thumb">
                                                <i class="fa fa-file-pdf-o aero"></i>
                                            </a>
                                            <div class="media-body">
                                                <a class="title" href="#">Contrats</a>
                                                <p><strong>{{ $dashboard[0]->nbr_contrat }} contrats</strong>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="media event">
                                            <a class="pull-left border-green profile_thumb">
                                                <i class="fa fa-home green"></i>
                                            </a>
                                            <div class="media-body">
                                                <a class="title" href="#">Emplacements</a>
                                                <p><strong>{{ $dashboard[0]->nbr_emplacement_occup }} emplacements</strong> 
                                                </p>
                                            </div>
                                        </li>
                                        <li class="media event">
                                            <a class="pull-left border-blue profile_thumb">
                                                <i class="fa fa-tasks blue"></i>
                                            </a>
                                            <div class="media-body">
                                                <a class="title" href="#">Compteurs CIE</a>
                                                <p><strong>{{ $dashboard[0]->nbr_cie }} compteurs</strong> 
                                                </p>
                                            </div>
                                        </li>
                                        <li class="media event">
                                            <a class="pull-left border-aero profile_thumb">
                                                <i class="fa fa-tasks aero"></i>
                                            </a>
                                            <div class="media-body">
                                                <a class="title" href="#">Compteurs SODECI</a>
                                                <p><strong>{{ $dashboard[0]->nbr_sodeci }} compteurs</strong>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="media event">
                                            <a class="pull-left border-green profile_thumb">
                                                <i class="fa fa-tasks green"></i>
                                            </a>
                                            <div class="media-body">
                                                <a class="title" href="#">Compteurs GAZ</a>
                                                <p><strong>{{ $dashboard[0]->nbr_sodeci }} compteurs</strong>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            

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
            type:"bar",
            data:{
                labels:["Janvier", "Février", "Mars","Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre","Novembre", "Décembre"],
            datasets:[
                {
                    label:"Les Paiements effectués en fonction du mois",
                    data:[
                        {{ $diagrame[0]->janv }},
                        {{ $diagrame[0]->fev }},
                        {{ $diagrame[0]->mars }},
                        {{ $diagrame[0]->avril }},
                        {{ $diagrame[0]->mais }},
                        {{ $diagrame[0]->juin }},
                        {{ $diagrame[0]->juil }},
                        {{ $diagrame[0]->aout }},
                        {{ $diagrame[0]->sept }},
                        {{ $diagrame[0]->oct }},
                        {{ $diagrame[0]->nov }},
                        {{ $diagrame[0]->decem }},
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
@endsection