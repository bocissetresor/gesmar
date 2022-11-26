@extends('layouts.app')
@section('content')
            
     <!-- page content -->
     <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Menu Ordonnancement</h3>
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Choisir ...</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="width: 100%;text-align: center;">
                    <a class="btn btn-app" href="{{ url('affiche_contrat') }}" width="300px">
                        <i class="fa fa-file"></i>CONTRAT
                    </a>
                    <a class="btn btn-app" href="{{ url('ordonnacement_loyer') }}">
                        <i class="glyphicon glyphicon-home"></i> LOYER
                    </a>
                    
                    <a class="btn btn-app" href="{{ url('ordonnacement_cie') }}">
                        <i class="glyphicon glyphicon-certificate"></i> CIE
                    </a>
                    <hr>
                    <a class="btn btn-app" href="{{ url('ordonnacement_sodeci') }}">
                        <i class="glyphicon glyphicon-tint"></i> SODECI
                    </a>
                    <a class="btn btn-app" href="{{ url('ordonnacement_gaz') }}">
                        <span class="badge bg-red">6</span>
                        <i class="glyphicon glyphicon-cutlery"></i> GAZ
                    </a>
                    <a class="btn btn-app" href="{{ url('ordonnacement_equipement') }}">
                        <i class="glyphicon glyphicon-tasks"></i> AUTRE
                    </a>

                </div>
            </div>

        </div>


    </div>
</div>
</div>
@endsection