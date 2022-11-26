@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Création de Locataire</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Veuillez remplir ce formulaire</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <form method="POST" action="{{ url('nouveau_client') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nom:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control"  class='optional' name="nom" data-validate-length-range="5,15" type="text"/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Denomination:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='optional' name="denomination" data-validate-length-range="5,15" type="text"/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Type<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='optional' name="type" data-validate-length-range="5,15" type="text"/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Adresse Postale:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='optional' name="adresse_postale" data-validate-length-range="5,15" type="text"/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Ville<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='optional' name="ville" data-validate-length-range="5,15" type="text"/></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tel:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='optional' name="tel" data-validate-length-range="5,15" type="text"/></div>
                        </div>
                        {{-- <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Statut<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='optional' name="statut" data-validate-length-range="5,15" type="text"/></div>
                        </div> --}}
                        <div class="ln_solid">
                            <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                    <button type='submit' class="btn btn-primary">VALIDER</button>
                                    <button type='reset' class="btn btn-success">REINITIALISER</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection