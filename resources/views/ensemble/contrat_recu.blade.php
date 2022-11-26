{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="{{ asset('pdf/script.js') }}"></script>
</head>
<body>
    <div id="pdf">
        {{ $contrats }}
    </div>
    <button onclick="generatePDF()">Download</button>
</body>
</html>
 --}}
 @extends('layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>CONTRAT</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button"  ><a href="{{ url('nouveau_client') }}" style="color:aliceblue"> 
                            <h2>
                                <i class="fa fa-calendar"></i>.Aujourd'hui:
                                 
                                      <script>
                                      date = new Date().toLocaleDateString();
                                      document.write(date);
                                      </script>
                                
                            </h2>  
                        </a></button>
                          
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>CONTRAT : {{ $contrats[0]->code }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <section class="content invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="  invoice-header">
                                 
                                    <h2>
                                        <i class="fa fa-calendar"></i>
                                            Date paiement: {{ $contrats[0]->created_at }}
                                    </h2>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Nom & Prénom Locataire :{{ $contrats[0]->nom_locataire }}  {{ $contrats[0]->denomination }}<br> 
                                    Tél Locataire : {{ $contrats[0]->tel }} <br>
                                    Adresse Locataire : {{ $contrats[0]->adresse_locataire }}
                                    <br> Commentaire a l'ouverture : Néant <br>
                                    Code Reçu: 2022-{{ $contrats[0]->code }}
                                </div>
                            </div>
                            <hr>
                            <h3 style="text-align:center">Liste des Dépenses</h3> <br>
                            <div style="text-align:center">
                                <a class="btn btn-app" href="regler_facture_contrat.html">
                                    <i class="glyphicon glyphicon-file"></i> CONTRAT
                                </a>
                                @if ($contrats[0]->empl_code!=NULL)
                                    <a class="btn btn-app" href="paiement.html">
                                        <i class="glyphicon glyphicon-home"></i> {{ $contrats[0]->empl_code }}
                                    </a>
                                @else
                                    <a class="btn btn-danger btn-xs" style="pointer-events: none;cursor: default;" href="paiement.html">
                                        <i class="fa fa-close"></i> LOYER
                                    </a>
                                @endif

                                @if ($contrats[0]->cie_code!=NULL)
                                    <a class="btn btn-app" href="paiement_cie.html">
                                        <i class="glyphicon glyphicon-certificate"></i> {{ $contrats[0]->cie_code }}
                                    </a>
                                @else
                                    <a class="btn btn-danger btn-xs" style="pointer-events: none;cursor: default;" href="paiement_cie.html">
                                        <i class="fa fa-close"></i> CIE
                                    </a>
                                @endif

                                @if ($contrats[0]->sodeci_code!=NULL)
                                    <a class="btn btn-app" href="paiement_sodeci.html">
                                        <i class="glyphicon glyphicon-tint"></i> {{ $contrats[0]->sodeci_code }}
                                    </a>
                                @else
                                    <a class="btn btn-danger btn-xs" style="pointer-events: none;cursor: default;" href="paiement_sodeci.html">
                                        <i class="fa fa-close"></i> SODECI
                                    </a>
                                @endif

                                @if ($contrats[0]->gaz_code!=NULL)
                                    <a class="btn btn-app" href="paiement_gaz.html">
                                        <i class="glyphicon glyphicon-cutlery"></i> {{ $contrats[0]->gaz_code }}
                                    </a>
                                @else
                                    <a class="btn btn-danger btn-xs" style="pointer-events: none;cursor: default;" href="paiement_gaz.html">
                                        
                                        <i class="fa fa-close"></i> GAZ
                                    </a>
                                @endif

                                @if ($contrats[0]->prop_code!=NULL)
                                    <a class="btn btn-app" href="paiement_equipement.html">
                                        <i class="glyphicon glyphicon-tasks"></i> {{ $contrats[0]->prop_code }}
                                    </a>
                                @else
                                    <a class="btn btn-danger btn-xs" style="pointer-events: none;cursor: default;" href="paiement_equipement.html">
                                        <i class="fa fa-close"></i> AUTRE
                                    </a>
                                @endif
                                
                            </div>
                            
                            <h3>Le montant payer </h3>
                            <!-- Table row -->
                            <div class="row">
                                <div class="  table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Somme</th>
                                                <th>Motif</th>
                                                <th>Mode</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>650 XOF</td>
                                                <td>TVA</td>
                                                <td>Espece</td>
                                                <td style="color:green"><i class="fa fa-check-square fa-2x"></i></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>450 XOF</td>
                                                <td>Sécurité</td>
                                                <td>Espece</td>
                                                <td style="color:green"><i class="fa fa-check-square fa-2x"></i></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>450 XOF</td>
                                                <td>Nétoyage</td>
                                                <td>Espece</td>
                                                <td style="color:green"><i class="fa fa-check-square fa-2x"></i></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><h2> {{ $contrats[0]->som_toto }} XOF</h2></td>
                                                <td>Somme totale à payer</td>
                                                <td>Espece</td>
                                                <td style="color:green"><i class="fa fa-check-square fa-2x"></i></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td><h2> {{ $contrats[0]->som_payer_ouverture }} XOF</h2></td>
                                                <td>Somme payer</td>
                                                <td>Espece</td>
                                                <td style="color:green"><i class="fa fa-check-square fa-2x"></i></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td><h2>{{ $contrats[0]->som_restant_ouverture }} XOF</h2></td>
                                                <td>Somme restant</td>
                                                <td>Espece</td>
                                                <td style="color:green"><i class="fa fa-check-square fa-2x"></i></td>
                                            </tr>
                                            
                        
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-md-6">
                                    <p class="lead">Les méthodes de paiements disponibles:</p>
                                    <img src="{{ url('images/visa.png') }}" alt="Visa">
                                    <img src="{{ url('images/mastercard.png') }}" alt="Mastercard">
                                    <img src="{{ url('images/american-express.png') }}" alt="American Express">
                                    <img src="{{ url('images/paypal.png') }}" alt="Paypal"> <hr>
                                   <p style="margin-left: 55px"> {{ QrCode::generate($contrats[0]->code) }}</p>

                                </div>
                                
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <p class="lead">Plus de Détail</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="width:50%">Loyer:</th>
                                                    <td>1/Mois</td>
                                                    <td>{{ $contrats[0]->loyer }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Pas de Porte</th>
                                                    <td>1 à Vie</td>
                                                    <td>{{ $contrats[0]->pas_porte }}</td>
                                                </tr>
                                                <tr>
                                                    <th>CIE:</th>
                                                    <td>1/Mois</td>
                                                    <td>500 XOF</td>
                                                </tr>
                                                <tr>
                                                    <th>SODECI:</th>
                                                    <td>1/Mois</td>
                                                    <td>400 XOF</td>
                                                </tr>
                                                <tr>
                                                    <th>GAZ:</th>
                                                    <td>1/Mois</td>
                                                    <td>350 XOF</td>
                                                </tr>
                                                <tr>
                                                    <th>AUTRE EQUIPEMENT:</th>
                                                    <td>1/Mois</td>
                                                    <td>200 XOF</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class=" ">
                                    <button class="btn btn-success pull-right" onclick="window.print();"><i class="fa fa-print"></i> Imprime L'etat</button>
                                </div>
                                {{-- <div class=" ">
                                    <button class="btn btn-danger pull-right"><i class="fa fa-remove"></i> Fermer Caisse</button>
                                </div> --}}
                                {{-- <div class=" ">
                                    <button class="btn btn-primary pull-right"><i class="fa fa-eye"></i> La liste journalière</button>
                                </div> --}}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection