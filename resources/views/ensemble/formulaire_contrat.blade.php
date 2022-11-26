@extends('layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Demande de Contrat</h3>
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
                        <form class="" action="{{ url('formulaire_contrat') }}" method="post" novalidate>
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Date Debut:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="date_debut" required='required'></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Type Contrat:</label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="type">
                                        <option value="avance sur echance loyer">Avance sur échéance Loyer</option>
                                        <option value="additif au contrat">Additif au contrat</option>
                                        <option value="avance sur echance Pas de porte">Avance sur echance Pas de Porte</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Code Locataire:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $locataires->code }}" class='optional' name="code_locataire" data-validate-length-range="5,15" type="text" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">N°Locataire:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $locataires->id }}" class='optional' name="locataire_id" data-validate-length-range="5,15" type="text" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nom Locataire:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $locataires->nom }}" class='optional' name="nom_locataire" data-validate-length-range="5,15" type="text" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Type Locataire:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $locataires->type }}" class='optional' name="type_locataire" data-validate-length-range="5,15" type="text" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Adresse Postale:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $locataires->adresse_postale }}" class='optional' name="adresse_postale" data-validate-length-range="5,15" type="text" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tel Locataire:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" value="{{ $locataires->tel }}" class='optional' name="tel_locataire" data-validate-length-range="5,15" type="text" readonly/></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Emplacement:</label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="emplacements_id[]" id="emplacements_id" class="selectpicker" data-live-search="true" {{-- multiple --}}>
                                        <option selected value="#">Choisir emplacement</option>
                                        @foreach($emplacements as $emplacement)
                                            @if ( $emplacement->statut == 0 )
                                                <option value="{{ $emplacement->id }}">{{ $emplacement->designation }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Equipement:</label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="proprietes[]" id="propriete_id" class="selectpicker" data-live-search="true" {{-- multiple --}}>
                                        <option value="#">Choisir propriete</option>
                                            @foreach($proprietes as $propriete)
                                                @if ( $propriete->statut == 0 )
                                                    <option value="{{ $propriete->id }}">{{ $propriete->denomination }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Gaz:</label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="gaz_id[]" id="gaz_id" class="selectpicker" data-live-search="true" {{-- multiple --}}>
                                        <option value="#">Choisir l'gaz</option>
                                            @foreach($gazs as $gaz)
                                                @if ( $gaz->statut == 0 )
                                                    <option value="{{ $gaz->id }}">{{ $gaz->denomination }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Equipement Sodeci:</label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="compteur_sodeci_id[]" id="compteur_sodeci_id" class="selectpicker" data-live-search="true" {{-- multiple --}}>
                                        <option value="#">Choisir l'compteurSodeci</option>
                                            @foreach($compteurSodecis as $compteurSodeci)
                                                @if ( $compteurSodeci->statut == 0 )
                                                    <option value="{{ $compteurSodeci->id }}">{{ $compteurSodeci->denomination }}</option>
                                                @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Equipement Cie:</label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="compteur_cie_id[]" id="compteur_cie_id" class="selectpicker" data-live-search="true" {{-- multiple --}}>
                                        <option value="#">Choisir compteurCie</option>
                                            @foreach($compteurCies as $compteurCie)
                                                @if ( $compteurCie->statut == 0 )
                                                    <option value="{{ $compteurCie->id }}">{{ $compteurCie->denomination }}</option>
                                                @endif
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