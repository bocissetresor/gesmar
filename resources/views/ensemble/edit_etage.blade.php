@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editer Etage</h3>
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

                        <form method="POST" action="{{ url('update_etage/'. $etage->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Designation:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $etage->designation }}"  class='optional' name="designation" data-validate-length-range="5,15" type="text"/></div>
                            </div>

                            {{-- <select name="batiment_id" id="batiment_id" >
                                <option value="{{ $etage->batiment_id }}">{{ $etage->batiment_id }}</option>
                                @foreach($batiments as $batiment)
                                <option value="{{ $batiment->id }}">{{ $batiment->designation }}</option>
                                @endforeach
                            </select> --}}

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Selectionner Batiment</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="batiment_id" id="batiment_id" class="select2_single form-control" tabindex="-1">
                                            @foreach($batiments as $batiment)
                                                <option value="{{ $batiment->id }}">{{ $batiment->designation }}</option>
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