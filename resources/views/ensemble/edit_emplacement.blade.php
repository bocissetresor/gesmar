@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editer Emplacement</h3>
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
                        <form method="POST" action="{{ url('update_emplacement/'. $emplacement->id) }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Code: <input type="text" name="code"> <br> -->
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Designation:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $emplacement->designation }}" class='optional' name="designation" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Superficie:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $emplacement->superficie }}" class='optional' name="superficie" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Loyer:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $emplacement->loyer }}" class='optional' name="loyer" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Pas de Porte:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $emplacement->pas_porte }}" class='optional' name="pas_porte" data-validate-length-range="5,15" type="text"/></div>
                            </div>
                            {{-- <select name="zone_id" id="zone_id" >
                                <option value="{{ $emplacement->zone_id }}">{{ $emplacement->zone_id }}</option>
                                @foreach($zones as $zone)
                                <option value="{{ $zone->id }}">{{ $zone->designation }}</option>
                                @endforeach
                            </select> --}}

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