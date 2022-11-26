@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editer Site</h3>
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
                        <form method="POST" action="{{ url('update_site/'. $site->id) }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Code: <input type="text" name="code"> <br> -->
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Designation:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $site->designation }}"  class='optional' name="designation" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Adresse Graphique:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $site->adresse_graphique }}"  class='optional' name="adresse_graphique" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Adresse Postale:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control"  value="{{ $site->adresse_postale }}"  class='optional' name="adresse_postale" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Type:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $site->type }}"  class='optional' name="type" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Ville:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $site->ville }}"  class='optional' name="ville" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Commune:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $site->commune }}"  class='optional' name="commune" data-validate-length-range="5,15" type="text"/></div>
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