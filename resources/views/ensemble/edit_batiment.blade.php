@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editer Batiment</h3>
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
                        <form method="POST" action="{{ url('update_batiment/'. $batiment->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Designation:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $batiment->designation }}"  class='optional' name="designation" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <!-- Code: <input type="text" name="code"> <br> -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Selectionner Site</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="site_id" id="site_id" class="select2_single form-control" tabindex="-1">
                                            {{-- <option value="{{ $batiment->site_id }}">{{ $batiment->designation }}</option> --}}
                                            @foreach($sites as $site)
                                                <option value="{{ $site->id }}">{{ $site->designation }}</option>
                                            @endforeach
                                    </select>
                                </div>
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