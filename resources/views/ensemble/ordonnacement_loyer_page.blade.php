@extends('layouts.app')
@section('content')
{{-- <script>
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="date" min="{{ now()->toDateString('Y-m-d') }}" name="date_ordonnacement[]"/><input type="number" min="{{ 0 }}" max="{{ $contrats->emplacements->sum('loyer')+$contrats->emplacements->sum('pas_porte') }}" name="somme_ordonnacement[]"/><a href="#" class="remove_field">Supprimer</a></div>'); //add input box

        }
    });

    $('form').submit(function(e) {
        e.preventDefault();
        let inputs = document.querySelectorAll('[name="somme_ordonnacement[]"]');
        if(inputs.length) {
            let total = parseInt($('#total').val()),
            somme = 0;
            inputs.forEach(el => {
                somme += parseInt(el.value)
            });
            if(somme > total) {
                alert("Les sommes ordonnancement dépassent le total.")
            } else {
                $(this)[0].submit()
            }
        }
    })

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    });
    </script> --}}
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ordonnancement de Loyer</h3>
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
                        <form method="POST" action="{{ url('ordonnacement_loyer_page_post/'. $contrats->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Code Contrat:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' name="code_locataire" data-validate-length-range="5,15" type="text" value="{{  $contrats->code  }}" readonly /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Date de Debut:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' name="date_debut" data-validate-length-range="5,15" type="date" value="{{ $contrats->date_debut }}" readonly /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Type:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' name="type" data-validate-length-range="5,15" type="text" value="{{ $contrats->type }}" readonly /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nom Locataire:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' name="nom_locataire" data-validate-length-range="5,15" type="text" value="{{ $contrats->nom_locataire }}" readonly /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Code Locataire:<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' name="code_locataire" data-validate-length-range="5,15" type="text" value="{{ $contrats->code_locataire }}" readonly /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Loyer :<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='optional' name="loyer" data-validate-length-range="5,15" type="number" value="{{ $contrats->emplacements->sum('loyer') }}" readonly /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Somme Totale :<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" id="total" class='optional' data-validate-length-range="5,15" type="number" value="{{ $contrats->som_toto }}" readonly /></div>
                            </div>

                {{--             Code Contrat: <input type="text" name="code" value="{{ $contrats->code }}" readonly><br>
                            Date de Debut: <input type="date" name="date_debut" value="{{ $contrats->date_debut }}"> <br>
                            Type: <input type="text" name="type" value="{{ $contrats->type }}" readonly> <br>
                            Nom Locataire: <input type="text" name="nom_locataire" value="{{ $contrats->nom_locataire }}" readonly> <br>
                            Code Locataire: <input type="text" name="code_locataire" value="{{ $contrats->code_locataire }}" readonly> <br>
                            Loyer : <input type="number" value="{{ $contrats->emplacements->sum('loyer') }}" readonly><br>
                            Somme Totaux : <input type="number" id="total" value="{{ $contrats->som_toto }}" readonly><br> 
                <div class="input_fields_wrap">
                    <button class="add_field_button">Ajouter un ordonancement</button>
                    <div><input type="date" min="{{ now()->toDateString('Y-m-d') }}" name="date_ordonnacement[]">
                    <input type="number" name="somme_ordonnacement[]" min="{{ $contrats->som_toto-$contrats->som_toto+1 }}" max="{{ $contrats->som_toto }}"></div>
                </div> --}}
                <div class="input_fields_wrap" style="width:100%; width: 400px;margin: auto; ">
                    <button class="add_field_button" style="color:dimgray; "><i class="fa fa-plus-circle fa-3x"></i><span>Pour Ajouter Ordonnancement</span></button>
                    <input type="date" class="form-control mb-3" min="{{ now()->toDateString('Y-m-d') }}" name="date_ordonnacement[]" required>
                    <input type="number" class="form-control mb-3" name="somme_ordonnacement[]" min="{{ $contrats->som_toto-$contrats->som_toto+1 }}" max="{{ $contrats->som_toto }}" required>
                </div>
            
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="col-md-4"></div>
</div>
<script>
$(document).ready(function() {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            /* $(wrapper).append('<div class="input-group mb-3"><input type="date" class="form-control mb-3" min="{{ now()->toDateString('Y-m-d') }}" name="date_ordonnacement[] required /> <input type="number" class="form-control mb-3" min="{{ 0 }}" max="{{ $contrats->emplacements->sum('loyer')+$contrats->emplacements->sum('pas_porte') }}" name="somme_ordonnacement[]" required /><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button"><i class="fa fa-close"></i></button></div></div>'); */ //add input box
            $(wrapper).append('<div class="input-group mb-3"><input placeholder="Date" type="date" min="{{ now()->toDateString('Y-m-d') }}" name="date_ordonnacement[] required class="form-control"><input placeholder="Somme" type="number" min="{{ 0 }}" max="{{ $contrats->emplacements->sum('loyer')+$contrats->emplacements->sum('pas_porte') }}" name="somme_ordonnacement[]" required class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button"><i class="fa fa-close"></i></button></div></div>'); //add input box
        }
    });

    $('form').submit(function(e) {
        e.preventDefault();
        let inputs = document.querySelectorAll('[name="somme_ordonnacement[]"]');
        if(inputs.length) {
            let total = parseInt($('#total').val()),
            somme = 0;
            inputs.forEach(el => {
                somme += parseInt(el.value)
            });
            if(somme > total) {
                alert("Les sommes ordonnancement dépassent le total.")
            } else {
                $(this)[0].submit()
            }
        }
    })

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').parent('div').remove();
        x--;
    })
});
</script>
@endsection

