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
                <h3>Ordonnancement de GAZ</h3>
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
                    <form action="{{ url('ordonnacement_gaz_page_post/'. $gazs->id) }}" method="POST">
                        @csrf
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Code Compteur GAZ:<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" class='optional' name="" data-validate-length-range="5,15" type="text" value="{{ $gazs->code }}" readonly /></div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Code Contrat :<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($gazs->Gazs as $Gaz)
                                <input class="form-control" class='optional' name="" data-validate-length-range="5,15" type="text" value="{{ $Gaz->code }}" readonly /></div>
                                @endforeach
                        </div>

                            <hr>
                            <h3 style="text-align: center;">Information Totaux</h3>
                            <hr>
                            <div class="input_fields_wrap" style="width:100%; width: 400px;margin: auto; ">
                                <button class="add_field_button" style="color:dimgray; "><i class="fa fa-plus-circle fa-3x"></i><span>Pour Ajouter Ordonnancement</span></button>
                                <input type="date" class="form-control mb-3" min="{{ now()->toDateString('Y-m-d') }}" name="date_ordonnacement[]" required>
                                <input type="number" class="form-control mb-3" name="somme_ordonnacement[]" min="{{ $gazs->index_fn-$gazs->index_fn+1 }}" max="{{ ($gazs->index_fn - $gazs->index_dbt)*1022 }}" required>
                            </div>
                            
                            <hr>
                            <table class="table table-striped table-bordered proposal-table" id="proposal-table">
                            <thead>
                                <tr>
                                <th>Mois</th>
                                <th>Index Debut</th>
                                <th>Index Fin</th>
                                <th>Somme a Payer</th>
                                <th>Credit</th>
                                <th>Somme Totaux a Payer</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>


                                    <td><input type="date" name="mois_payer" value="{{ $gazs->mois_payer }}" readonly></td>
                                    <td><input type="number" class="form-control variable-field " name="index_dbt" value="{{ $gazs->index_dbt }}" readonly/></td>
                                    <td><input type="number" class="form-control variable-field " name="index_fn" value="{{ $gazs->index_fn }}" readonly/></td>
                                    <td><input type="number" class="form-control width-80" name="somme_a_payer" value="{{ ($gazs->index_fn - $gazs->index_dbt)*1022 }}" readonly /></td>
                                    <td><input type="number" class="form-control width-80 " value="{{ $gazs->somme_restant }}" readonly /></td>
                                    <td><input type="number" class="form-control variable-field quantity" value="{{ (($gazs->index_fn - $gazs->index_dbt)*1022 + $gazs->somme_restant) }}" id="total" readonly /></td>

                                </tr>

                            </tbody>

                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                                $(wrapper).append('<div class="input-group mb-3"><input placeholder="Date" type="date" min="{{ now()->toDateString('Y-m-d') }}" name="date_ordonnacement[] required class="form-control"><input placeholder="Somme" type="number" min="{{ 0 }}" max="{{ (($gazs->index_fn - $gazs->index_dbt)*1022 + $gazs->somme_restant) }}" name="somme_ordonnacement[]" required class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button"><i class="fa fa-close"></i></button></div></div>'); //add input box
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
                    <script>
                        $(document).ready(function () {
                            //When there are changes in the input fields of the 1st or 2nd column we calculate the totalCost
                            $('.variable-field').bind("change", function () {
                                var currentTD = $(this).parents('tr').find('td');
                                var totalCost = Number(currentTD[5].firstChild.value) - Number(currentTD[6].firstChild.value);
                                //The substring is to round the number to 4 decimal places
                                currentTD[7].firstChild.value = totalCost.toString().substring(0, totalCost.toString().indexOf(".") + 100);
                                //alert(totalCost);
                            });
                        });
                    </script>
                    @endsection
                    
                    