@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editer</h3>
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

    <form method="POST" action="{{ url('update_compteurSodeci/'. $compteurSodeci->id) }}" enctype="multipart/form-data">
        @csrf
        <!-- Code: <input type="text" name="code"> <br> -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Designation:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control"  class='optional' name="denomination" value="{{ $compteurSodeci->denomination }}" data-validate-length-range="5,15" type="text"/></div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Index Debut:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control"  class='optional' min="0" value="{{ $compteurSodeci->index_dbt }}" name="index_dbt" data-validate-length-range="5,15" type="number"/></div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Index Fin:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control"  class='optional' min="0" value="{{ $compteurSodeci->index_fn }}" name="index_fn" data-validate-length-range="5,15" type="number"/></div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Somme à Payer:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control"  class='optional' min="0" value="{{ $compteurSodeci->som_total }}"  name="som_total" data-validate-length-range="5,15" type="number"/></div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Unite Index:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control"  class='optional' min="0" value="{{ $compteurSodeci->unite_index }}" name="unite_index" data-validate-length-range="5,15" type="number"/></div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">statut:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control"  class='optional' value="{{ $compteurSodeci->statut }}" name="statut" data-validate-length-range="5,15" type="text"/></div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">adresse_gps:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control"  class='optional' value="{{ $compteurSodeci->adresse_gps }}" name="adresse_gps" data-validate-length-range="5,15" type="text"/></div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Libelle:<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control"  class='optional' value="{{ $compteurSodeci->libelle }}" name="libelle" data-validate-length-range="5,15" type="text"/></div>
        </div>
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