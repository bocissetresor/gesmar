<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

//SITE
Route::get('/creat_site', '\App\Http\Controllers\SiteController@creat_site')->name('creat_site');
Route::post('/creat_site', '\App\Http\Controllers\SiteController@store');
Route::get('/affiche', '\App\Http\Controllers\AfficheController@affiche')->name('affiche');
Route::get('/edit_site/{id}', '\App\Http\Controllers\AfficheController@edit_site')->name('edit_site');
Route::post('/update_site/{id}', '\App\Http\Controllers\AfficheController@update_site');
Route::get('/supprimer_site/{id}', '\App\Http\Controllers\AfficheController@destroy')->name('supprimer_site');

//BATIMENT
Route::get('/creat_batiment/{id}', '\App\Http\Controllers\BatimentController@creat_batiment');
Route::post('/creat_batiment/{id}', '\App\Http\Controllers\BatimentController@store');
Route::get('affiche_batiment/{id}', '\App\Http\Controllers\BatimentController@affiche_batiment')->name('affiche_batiment');
Route::get('/edit_batiment/{id}', '\App\Http\Controllers\BatimentController@edit_batiment');
Route::post('/update_batiment/{id}', '\App\Http\Controllers\BatimentController@update_batiment');
Route::get('/supprimer_batiment/{id}', '\App\Http\Controllers\BatimentController@destroy');


//ETAGE
Route::get('/creat_etage/{id}', '\App\Http\Controllers\EtageController@creat_etage');
Route::post('/creat_etage/{id}', '\App\Http\Controllers\EtageController@store');
Route::get('affiche_etage/{id}', '\App\Http\Controllers\EtageController@affiche_etage')->name('affiche_etage');
Route::get('/edit_etage/{id}', '\App\Http\Controllers\EtageController@edit_etage');
Route::post('/update_etage/{id}', '\App\Http\Controllers\EtageController@update_etage');
Route::get('/supprimer_etage/{id}', '\App\Http\Controllers\EtageController@destroy');


//ZONE
Route::get('/creat_zone/{id}', '\App\Http\Controllers\ZoneController@creat_zone');
Route::post('/creat_zone/{id}', '\App\Http\Controllers\ZoneController@store');
Route::get('affiche_zone/{id}', '\App\Http\Controllers\ZoneController@affiche_zone')->name('affiche_zone');
Route::get('/edit_zone/{id}', '\App\Http\Controllers\ZoneController@edit_zone');
Route::post('/update_zone/{id}', '\App\Http\Controllers\ZoneController@update_zone');
Route::get('/supprimer_zone/{id}', '\App\Http\Controllers\ZoneController@destroy');


//EMPLACEMENT
Route::get('/creat_emplacement/{id}', '\App\Http\Controllers\EmplacementController@creat_emplacement');
Route::post('/creat_emplacement/{id}', '\App\Http\Controllers\EmplacementController@store');
Route::get('affiche_emplacement/{id}', '\App\Http\Controllers\EmplacementController@affiche_emplacement')->name('affiche_emplacement');
Route::get('/edit_emplacement/{id}', '\App\Http\Controllers\EmplacementController@edit_emplacement');
Route::post('/update_emplacement/{id}', '\App\Http\Controllers\EmplacementController@update_emplacement');
Route::get('/supprimer_emplacement/{id}', '\App\Http\Controllers\EmplacementController@destroy');
Route::get('/affiche_emplacement1', '\App\Http\Controllers\EmplacementController@affiche_emplacement1');

//LOCATAIRE
Route::get('/creat_locataire', '\App\Http\Controllers\LocataireController@creat_locataire');
Route::post('/creat_locataire', '\App\Http\Controllers\LocataireController@store');
Route::get('affiche_locataire', '\App\Http\Controllers\LocataireController@affiche_locataire')->name('affiche_locataire');
Route::get('/edit_locataire/{id}', '\App\Http\Controllers\LocataireController@edit_locataire');
Route::post('/update_locataire/{id}', '\App\Http\Controllers\LocataireController@update_locataire');
Route::get('/supprimer_locataire/{id}', '\App\Http\Controllers\LocataireController@destroy_');
Route::get('/nouveau_client', '\App\Http\Controllers\LocataireController@nouveau_client');
Route::post('/nouveau_client', '\App\Http\Controllers\LocataireController@store1');
Route::get('/affiche_nouveau_client/{code}', '\App\Http\Controllers\LocataireController@show')->name('affiche_nouveau_client');
Route::get('/desactiver_locataire/{id}', '\App\Http\Controllers\LocataireController@desactiver_locataire');
Route::get('/activer_locataire/{id}', '\App\Http\Controllers\LocataireController@activer_locataire');


//CONTRAT
//Route::post('/editer_contrat', '\App\Http\Controllers\ContratController@store');
Route::get('/ancien_client', '\App\Http\Controllers\ContratController@ancien_client');
// Route::post('/edit_contrat/{id}', '\App\Http\Controllers\ContratController@edit_contrat');
Route::post('/remplie_contrat/{id}', '\App\Http\Controllers\ContratController@remplie_contrat');
Route::get('/formulaire_contrat/{code}', '\App\Http\Controllers\ContratController@formulaire_contrat');
//Route::post('/formulaire_contrat', '\App\Http\Controllers\ContratController@store');
Route::post('/formulaire_contrat', '\App\Http\Controllers\ContratController@store');
Route::get('/affiche_contrat', '\App\Http\Controllers\ContratController@affiche_contrat')->name('affiche_contrat');
Route::get('/edit_contrat/{id}', '\App\Http\Controllers\ContratController@edit_contrat');
Route::post('/update_contrat/{id}', '\App\Http\Controllers\ContratController@update_contrat');
Route::get('/supprimer_contrat/{id}', '\App\Http\Controllers\ContratController@destroy');
Route::get('/voir_contrat/{id}', '\App\Http\Controllers\ContratController@voir_contrat');
Route::get('/formulaire_contrat/{code}/{id}', '\App\Http\Controllers\ContratController@resumer_contrat');
Route::get('/ordonnancement/{id}', '\App\Http\Controllers\ContratController@ordonnancement');
Route::post('/ordonnancement_buro2/{id}', '\App\Http\Controllers\ContratController@ordonnancement_buro2');
Route::get('/regler_facture_contrat', '\App\Http\Controllers\ContratController@regler_facture_contrat');
Route::get('/regler_facture_contrat_buro3/{id}', '\App\Http\Controllers\ContratController@regler_facture_contrat_buro3');
Route::post('/regler_facture_contrat_buro3_payer/{id}', '\App\Http\Controllers\ContratController@regler_facture_contrat_buro3_payer');
// Route::get('/contrat_recu/{id}', '\App\Http\Controllers\ContratController@contrat_recu')->name('contrat_recu');
Route::get('/affiche_resumer_compte', '\App\Http\Controllers\ContratController@affiche_resumer_compte');
Route::get('/affiche_contrat_index', '\App\Http\Controllers\ContratController@affiche_contrat_index')->name('affiche_contrat_index');
Route::get('/affiche_contrat_index2', '\App\Http\Controllers\ContratController@affiche_contrat_index2')->name('affiche_contrat_index2');


//PROPRIETE
Route::get('/creat_propriete', '\App\Http\Controllers\ProprieteController@creat_propriete');
Route::post('/creat_propriete', '\App\Http\Controllers\ProprieteController@store');
Route::get('/affiche_propriete', '\App\Http\Controllers\ProprieteController@affiche_propriete')->name('affiche_propriete');
Route::get('/destroy_equipement/{id}', '\App\Http\Controllers\ProprieteController@destroy_equipement');
Route::get('ordonnancement/edit_propriete/{id}', '\App\Http\Controllers\ProprieteController@edit_propriete');
Route::post('/update_propriete/{id}', '\App\Http\Controllers\ProprieteController@update_propriete');
Route::get('/regler_index_equipement/{id}', '\App\Http\Controllers\ProprieteController@regler_index_equipement')->name('regler_index_equipement');
Route::post('/regler_index_equipement_payer/{id}', '\App\Http\Controllers\ProprieteController@regler_index_equipement_payer')->name('regler_index_equipement_payer');
Route::get('/paiement_index_equipement/{id}', '\App\Http\Controllers\ProprieteController@paiement_index_equipement')->name('paiement_index_equipement');
Route::post('/paiement_index_equipement_payer/{id}', '\App\Http\Controllers\ProprieteController@paiement_index_equipement_payer')->name('paiement_index_equipement_payer');
Route::get('/paiement_equipement', '\App\Http\Controllers\ProprieteController@paiement_equipement')->name('paiement_equipement');


//COMPTEURCIE
Route::get('/creat_compteurCie', '\App\Http\Controllers\Compteur_cieController@creat_compteurCie');
Route::post('/creat_compteurCie', '\App\Http\Controllers\Compteur_cieController@store');
Route::get('/affiche_compteurCie', '\App\Http\Controllers\Compteur_cieController@affiche_compteurCie')->name('affiche_compteurCie');
Route::get('/destroy_cie/{id}', '\App\Http\Controllers\Compteur_cieController@destroy_cie');
Route::get('/edit_compteurCie/{id}', '\App\Http\Controllers\Compteur_cieController@edit_compteurCie');
Route::post('/update_compteurCie/{id}', '\App\Http\Controllers\Compteur_cieController@update_compteurCie');
Route::get('/regler_index_cie/{id}', '\App\Http\Controllers\Compteur_cieController@regler_index_cie')->name('regler_index_cie');
Route::post('/regler_index_cie_payer/{id}', '\App\Http\Controllers\Compteur_cieController@regler_index_cie_payer')->name('regler_index_cie_payer');
Route::get('/regler_index_cie2/{id}', '\App\Http\Controllers\Compteur_cieController@regler_index_cie2')->name('regler_index_cie2');
Route::post('/regler_index_cie_payer2/{id}', '\App\Http\Controllers\Compteur_cieController@regler_index_cie_payer2')->name('regler_index_cie_payer2');
Route::get('/paiement_cie', '\App\Http\Controllers\Compteur_cieController@paiement_cie')->name('paiement_cie');
Route::get('/paiement_index_cie/{id}', '\App\Http\Controllers\Compteur_cieController@paiement_index_cie')->name('paiement_index_cie');
Route::post('/paiement_index_cie_payer/{id}', '\App\Http\Controllers\Compteur_cieController@paiement_index_cie_payer')->name('paiement_index_cie_payer');

//COMPTEURSODECI
Route::get('/creat_compteurSodeci', '\App\Http\Controllers\Compteur_sodeciController@creat_compteurSodeci');
Route::post('/creat_compteurSodeci', '\App\Http\Controllers\Compteur_sodeciController@store');
Route::get('/affiche_compteurSodeci', '\App\Http\Controllers\Compteur_sodeciController@affiche_compteurSodeci')->name('affiche_compteurSodeci');
Route::get('/destroy_sodeci/{id}', '\App\Http\Controllers\Compteur_sodeciController@destroy_sodeci');
Route::get('/edit_compteurSodeci/{id}', '\App\Http\Controllers\Compteur_sodeciController@edit_compteurSodeci');
Route::post('/update_compteurSodeci/{id}', '\App\Http\Controllers\Compteur_sodeciController@update_compteurSodeci');
Route::get('/regler_index_sodeci/{id}', '\App\Http\Controllers\Compteur_sodeciController@regler_index_sodeci')->name('regler_index_sodeci');
Route::post('/regler_index_sodeci_payer/{id}', '\App\Http\Controllers\Compteur_sodeciController@regler_index_sodeci_payer')->name('regler_index_sodeci_payer');
Route::get('/paiement_index_sodeci/{id}', '\App\Http\Controllers\Compteur_sodeciController@paiement_index_sodeci')->name('paiement_index_sodeci');
Route::post('/paiement_index_sodeci_payer/{id}', '\App\Http\Controllers\Compteur_sodeciController@paiement_index_sodeci_payer')->name('paiement_index_sodeci_payer');
Route::get('/affiche_index_sodeci', '\App\Http\Controllers\Compteur_sodeciController@affiche_index_sodeci')->name('affiche_index_sodeci');
Route::get('/paiement_sodeci', '\App\Http\Controllers\Compteur_sodeciController@paiement_sodeci')->name('paiement_sodeci');

//GAZ
Route::get('/creat_gaz', '\App\Http\Controllers\GazController@creat_gaz');
Route::post('/creat_gaz', '\App\Http\Controllers\GazController@store');
Route::get('/affiche_gaz', '\App\Http\Controllers\GazController@affiche_gaz')->name('affiche_gaz');
Route::get('/destroy/{id}', '\App\Http\Controllers\GazController@destroy');
Route::get('/edit_gaz/{id}', '\App\Http\Controllers\GazController@edit_gaz');
Route::post('/update_gaz/{id}', '\App\Http\Controllers\GazController@update_gaz');
Route::get('/regler_index_gaz/{id}', '\App\Http\Controllers\GazController@regler_index_gaz')->name('regler_index_gaz');
Route::post('/regler_index_gaz_payer/{id}', '\App\Http\Controllers\GazController@regler_index_gaz_payer')->name('regler_index_gaz_payer');
Route::get('/paiement_index_gaz/{id}', '\App\Http\Controllers\GazController@paiement_index_gaz')->name('paiement_index_gaz');
Route::post('/paiement_index_gaz_payer/{id}', '\App\Http\Controllers\GazController@paiement_index_gaz_payer')->name('paiement_index_gaz_payer');
Route::get('/paiement_gaz', '\App\Http\Controllers\GazController@paiement_gaz')->name('paiement_gaz');


//PAIEMENT LOYER
Route::get('/paiement', '\App\Http\Controllers\ContratController@paiement');
Route::get('/paiement_loyer/{id}', '\App\Http\Controllers\ContratController@paiement_loyer');
Route::post('/paiement_loyer_payer/{id}', '\App\Http\Controllers\ContratController@paiement_loyer_payer');

//PAIEMENT SODECI
Route::get('/paiement_sodeci/{id}', '\App\Http\Controllers\Compteur_sodeciController@paiement_sodeci');
Route::post('/paiement_sodeci_payer/{id}', '\App\Http\Controllers\Compteur_sodeciController@paiement_sodeci_payer');

//PAIEMENT CIE
Route::get('/paiement_cie/{id}', '\App\Http\Controllers\Compteur_cieController@paiement_cie');
Route::post('/paiement_cie_payer/{id}', '\App\Http\Controllers\Compteur_cieController@paiement_cie_payer');

//PAIEMENT GAZ
Route::get('/paiement_gaz/{id}', '\App\Http\Controllers\GazController@paiement_gaz');
Route::post('/paiement_gaz_payer/{id}', '\App\Http\Controllers\GazController@paiement_gaz_payer');

//PAIEMENT EQUIPEMENT
Route::get('/paiement_equipement/{id}', '\App\Http\Controllers\ProprieteController@paiement_equipement');
Route::post('/paiement_equipement_payer/{id}', '\App\Http\Controllers\ProprieteController@paiement_equipement_payer');


//CAISSE
Route::get('/ouverture_caisse', '\App\Http\Controllers\CaisseController@ouverture_caisse');
Route::post('/ouverture_caisse_statut', '\App\Http\Controllers\CaisseController@ouverture_caisse_statut');
Route::get('/liste_paiement', '\App\Http\Controllers\CaisseController@liste_paiement');
Route::get('/page_ordonnacement', '\App\Http\Controllers\CaisseController@page_ordonnacement');
Route::get('/ordonnacement_loyer', '\App\Http\Controllers\CaisseController@ordonnacement_loyer');
Route::get('/ordonnacement_cie', '\App\Http\Controllers\CaisseController@ordonnacement_cie');
Route::get('/ordonnacement_sodeci', '\App\Http\Controllers\CaisseController@ordonnacement_sodeci');
Route::get('/ordonnacement_gaz', '\App\Http\Controllers\CaisseController@ordonnacement_gaz');
Route::get('/ordonnacement_equipement', '\App\Http\Controllers\CaisseController@ordonnacement_equipement');
Route::get('/ordonnacement_loyer_page/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_loyer_page');
Route::post('/ordonnacement_loyer_page_post/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_loyer_page_post');
Route::get('/ordonnacement_cie_page/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_cie_page');
Route::get('/ordonnacement_sodeci_page/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_sodeci_page');
Route::get('/ordonnacement_gaz_page/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_gaz_page');
Route::get('/ordonnacement_equipement_page/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_equipement_page');
Route::post('/ordonnacement_cie_page_post/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_cie_page_post');
Route::post('/ordonnacement_sodeci_page_post/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_sodeci_page_post');
Route::post('/ordonnacement_gaz_page_post/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_gaz_page_post');
Route::post('/ordonnacement_equipement_page_post/{id}', '\App\Http\Controllers\CaisseController@ordonnacement_equipement_page_post');
Route::get('/fermer_caisse', '\App\Http\Controllers\CaisseController@fermer_caisse');
Route::post('/fermer_caisse_regler', '\App\Http\Controllers\CaisseController@fermer_caisse_regler');
Route::get('/voir_paiement_journalier', '\App\Http\Controllers\CaisseController@voir_paiement_journalier');
Route::get('/etablir_loyer', '\App\Http\Controllers\CaisseController@etablir_loyer');
Route::get('/voir_historique_paiement', '\App\Http\Controllers\CaisseController@voir_historique_paiement');

//Commerciaux
Route::get('/affiche_commerciaux', '\App\Http\Controllers\CommerciauxController@affiche_commerciaux');
Route::get('/generer_bordereaux/{id}', '\App\Http\Controllers\CommerciauxController@generer_bordereaux')->name('generer_bordereaux');
Route::get('/regler_pass/{id}', '\App\Http\Controllers\CommerciauxController@regler_pass');
Route::post('/regler_pass_payer/{id}', '\App\Http\Controllers\CommerciauxController@regler_pass_payer');
Route::get('/creat_commerciaux', '\App\Http\Controllers\CommerciauxController@creat_commerciaux');
Route::post('/creat_commerciaux','\App\Http\Controllers\CommerciauxController@store');
Route::get('/supprimer_commerciaux/{id}', '\App\Http\Controllers\CommerciauxController@destroy');
Route::get('/edit_commerciaux/{id}', '\App\Http\Controllers\CommerciauxController@edit_commerciaux');
Route::post('/update_commerciaux/{id}', '\App\Http\Controllers\CommerciauxController@update_commerciaux');
Route::get('/desactiver_commerciaux/{id}', '\App\Http\Controllers\CommerciauxController@desactiver_commerciaux');
Route::get('/activer_commerciaux/{id}', '\App\Http\Controllers\CommerciauxController@activer_commerciaux');
Route::get('/affiche_box/{id}', '\App\Http\Controllers\CommerciauxController@affiche_box');
Route::post('/attribuer_emplacement/{id}', '\App\Http\Controllers\CommerciauxController@attribuer_emplacement');
Route::get('/commerciaux_voir_client','\App\Http\Controllers\CommerciauxController@commerciaux_voir_client');
Route::get('/commerciaux_voir_emplacement/{id}','\App\Http\Controllers\CommerciauxController@commerciaux_voir_emplacement');
Route::get('/commerciaux_voir_emplacement_pay/{id}','\App\Http\Controllers\CommerciauxController@commerciaux_voir_emplacement_pay');
Route::get('/commerciaux_voir_pay','\App\Http\Controllers\CommerciauxController@commerciaux_voir_pay');


//COMPTABLE
Route::get('/affiche_resumer_comptable', '\App\Http\Controllers\CommerciauxController@affiche_resumer_comptable');
Route::get('/etat_lieux', '\App\Http\Controllers\CommerciauxController@etat_lieux');
Route::get('/statistique_finance','\App\Http\Controllers\CommerciauxController@statistique_finance');
Route::get('/statistique_locataire', '\App\Http\Controllers\CommerciauxController@statistique_locataire');


#PDF
// Route::get('contrat_recu',array('as'=>'contrat_recu','uses'=>'ContratController@contrat_recu'))->name('contrat_recu');
Route::get('/contrat_recu/{id}', '\App\Http\Controllers\ContratController@contrat_recu')->name('contrat_recu');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::get('/dashboard', function () {
    $dashboard = DB::select('CALL dashboard');
    $diagrame = DB::select('CALL get_diagramme_par_mois');
    return view('dashboard', compact('dashboard','diagrame'));
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
