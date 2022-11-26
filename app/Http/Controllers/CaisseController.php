<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caisse;
use DB;
use App\Models\Compteur_cie;
use App\Models\Compteur_sodeci;
use App\Models\Gaz;
use App\Models\Propriete;
use App\Models\contrat;
use App\Models\Ordonnacement;
use App\Models\Ordonnacement_mensul;
use App\Models\Ordonnacement_cie;
use App\Models\Ordonnacement_gaz;
use App\Models\Ordonnacement_propriete;
use App\Models\Ordonnacement_sodeci;

class CaisseController extends Controller
{
    public function ouverture_caisse(){
        $caisses = Caisse::all()->last();
        return view('ensemble.ouverture_caisse', compact('caisses'));
    }

    public function ouverture_caisse_statut(){
        $caisses = Caisse::all()->last();
        DB::table('caisses')->where($caisses->id)->update(['statut'=>1]);
        return redirect('liste_paiement');
    }

    public function liste_paiement(){
        //$caisses = Caisse::all()->last();
        $caisses = DB::select('CALL admin_get_som_jr');
        $liste_paiements = DB::select('CALL admin_get_liste_caisse');
        return view('ensemble.liste_paiement', compact('caisses','liste_paiements'));
    }

    public function page_ordonnacement(){
        return view('ensemble.page_ordonnacement');
    }

    public function ordonnacement_loyer(){
        $contrats = contrat::all();
        return view('ensemble.ordonnacement_loyer', compact('contrats'));
    }

    public function ordonnacement_cie(){
        //$compteurCies = Compteur_cie::all();
        $compteurCies = DB::select('CALL admin_get_compteur_cie');
        return view('ensemble.ordonnacement_cie', compact('compteurCies'));
    }

    public function ordonnacement_sodeci(){
        //$compteurSodecis = Compteur_sodeci::all();
        $compteurSodecis = DB::select('CALL admin_get_compteur_sodeci');
        return view('ensemble.ordonnacement_sodeci', compact('compteurSodecis'));
    }

    public function ordonnacement_gaz(){
        //$gazs = Gaz::all();
        $gazs = DB::select('CALL admin_get_compteur_gaz');
        return view('ensemble.ordonnacement_gaz', compact('gazs'));
    }

    public function ordonnacement_equipement(){
        //$proprietes = Propriete::all();
        $proprietes = DB::select('CALL admin_get_compteur_equipement');
        return view('ensemble.ordonnacement_equipement', compact('proprietes'));
    }

    public function ordonnacement_loyer_page($id){
        $contrats = contrat::find($id);
        return view('ensemble.ordonnacement_loyer_page', compact('contrats'));
    }

    public function ordonnacement_loyer_page_post(Request $request, $id){
        $contrats = contrat::find($id);
        $ordonnacement = Ordonnacement_mensul::all();
        $nbr = $ordonnacement->count();
        $cod='Ordonna_mensu'.sprintf("%06d",((int)$nbr+1));
        foreach($request->date_ordonnacement as $key=>$date_ordonnacemen){
            DB::table('ordonnacement_mensuls')->insert(['code'=>$cod,'date_ordonnacement'=>$date_ordonnacemen, 'somme_ordonnacement'=>$request->somme_ordonnacement[$key],'statut'=>0 , 'contrat_id'=>$id]);
        }
        $contrats->statut_ordonnacement = 1;
        $contrats->update();
        return redirect('ordonnacement_loyer');
    }

    public function ordonnacement_cie_page($id){
        $compteurCies = Compteur_cie::find($id);
        //dd($compteurCies->Compteur_Cies->code);
        return view('ensemble.ordonnacement_cie_page', compact('compteurCies'));
    }

    public function ordonnacement_sodeci_page($id){
        $compteurSodecis = Compteur_sodeci::find($id);
        //return $compteurSodecis->code;
        //dd($compteurSodecis->Compteur_Sodecis);
        return view('ensemble.ordonnacement_sodeci_page', compact('compteurSodecis'));
    }

    public function ordonnacement_gaz_page($id){
        $gazs = Gaz::find($id);
        return view('ensemble.ordonnacement_gaz_page', compact('gazs'));
    }

    public function ordonnacement_equipement_page($id){
        $proprietes = Propriete::find($id);
        return view('ensemble.ordonnacement_equipement_page', compact('proprietes'));
    }

    public function ordonnacement_cie_page_post(Request $request, $id){

        $compteurCies = Compteur_cie::find($id);
        $ordonnacement = Ordonnacement_cie::all();
        $nbr = $ordonnacement->count();
        $cod='Ordonna_cie'.sprintf("%06d",((int)$nbr+1));
        foreach($request->date_ordonnacement as $key=>$date_ordonnacemen){
            DB::table('ordonnacement_cies')->insert(['code'=>$cod,'date_ordonnacement'=>$date_ordonnacemen, 'somme_ordonnacement'=>$request->somme_ordonnacement[$key],'statut'=>0 , 'compteur_cie_id'=>$id]);
        }
        $compteurCies->statut_ordonnacement = 1;
        $compteurCies->update();
        return redirect('ordonnacement_cie');
    }

    public function ordonnacement_sodeci_page_post(Request $request, $id){
        $compteurSodecis = Compteur_sodeci::find($id);
        $ordonnacement = Ordonnacement_sodeci::all();
        $nbr = $ordonnacement->count();
        $cod='Ordonna_sodeci'.sprintf("%06d",((int)$nbr+1));
        foreach($request->date_ordonnacement as $key=>$date_ordonnacemen){
            DB::table('ordonnacement_sodecis')->insert(['code'=>$cod,'date_ordonnacement'=>$date_ordonnacemen, 'somme_ordonnacement'=>$request->somme_ordonnacement[$key],'statut'=>0 , 'compteur_sodeci_id'=>$id]);
        }
        $compteurSodecis->statut=0;
        $compteurSodecis->statut_ordonnacement = 1;
        $compteurSodecis->update();
        return redirect('ordonnacement_sodeci');
    }

    public function ordonnacement_gaz_page_post(Request $request, $id){
        $gazs = Gaz::find($id);
        $ordonnacement = Ordonnacement_gaz::all();
        $nbr = $ordonnacement->count();
        $cod='Ordonna_gaz'.sprintf("%06d",((int)$nbr+1));
        foreach($request->date_ordonnacement as $key=>$date_ordonnacemen){
            DB::table('ordonnacement_gazs')->insert(['code'=>$cod,'date_ordonnacement'=>$date_ordonnacemen, 'somme_ordonnacement'=>$request->somme_ordonnacement[$key],'statut'=>0 , 'gaz_id'=>$id]);
        }
        $gazs->statut_ordonnacement = 1;
        $gazs->update();
        return redirect('ordonnacement_gaz');
    }

    public function ordonnacement_equipement_page_post(Request $request, $id){
        $proprietes = Propriete::find($id);
        $ordonnacement = Ordonnacement_propriete::all();
        $nbr = $ordonnacement->count();
        $cod='Ordonna_propriete'.sprintf("%06d",((int)$nbr+1));
        foreach($request->date_ordonnacement as $key=>$date_ordonnacemen){
            DB::table('ordonnacement_proprietes')->insert(['code'=>$cod,'date_ordonnacement'=>$date_ordonnacemen, 'somme_ordonnacement'=>$request->somme_ordonnacement[$key],'statut'=>0 , 'propriete_id'=>$id]);
        }
        $proprietes->statut_ordonnacement = 1;
        $proprietes->update();
        return redirect('ordonnacement_equipement');
    }

    public function voir_paiement_journalier(){
        //$caisses = Caisse::all();
        //$somme_total = Caisse::all()->first();
        $caisses = DB::select('CALL admin_get_liste_caisse_jr');
        $somme_total = DB::select('CALL admin_get_som_jr');
        return view('ensemble.voir_paiement_journalier', compact('caisses','somme_total'));
    }

    public function fermer_caisse(){
        $caisses = Caisse::all()->last();
        return view('ensemble.fermer_caisse', compact('caisses'));
    }

    public function fermer_caisse_regler(Request $request){
        $caisses = Caisse::create([
            'somme_total_paiement_effectuer' => $request->input('somme_total_paiement_effectuer'),
            'somme_ouverture' => $request->input('somme_total_paiement_effectuer'),
            'somme_fermeture' => $request->input('somme_fermerture'),
            'date_heure_fermeture' => $request->input('date_heure_fermerture'),
            'statut' => 1,
        ]);
        return redirect('ouverture_caisse');
    }
    // DB::table('ordonnacement_cies')->where('id', '=' , $id_ordonnacement)->update(['statut'=>1]);
    public function etablir_loyer(){
        DB::table('contrats')->update(['statut_ordonnacement'=>0]);
        $nbr = DB::select('CALL admin_get_count_loyer');
        $nbr_loyer = $nbr[0]->nbr;
        return view('ensemble.etablir_loyer', compact('nbr_loyer'));
    }

    public function voir_historique_paiement(){
        $liste_historiques = DB::select('CALL admin_get_historique');
        return view('ensemble.voir_historique_paiement', compact('liste_historiques'));
    }
}
