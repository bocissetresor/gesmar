<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compteur_cie;
use App\Models\CompteurCie;
use App\Models\contrat;
use App\Models\Caisse;
use DB;
use Carbon\Carbon;

class Compteur_cieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_compteurCie(){
        return view('ensemble.creat_compteurCie');
    }


     public function store(Request $request){

        $compteurCies = Compteur_cie::all();
        $nbr = $compteurCies->count();
        $cod='compteurCie-'.sprintf("%06d",((int)$nbr+1));

        $statut = 0;

        $post = Compteur_cie::create([
            'code' => $cod,
            'denomination' => $request->denomination,
            'index_dbt' =>$request->index_dbt,
            'index_fn' =>$request->index_fn,
            'som_total' =>$request->som_total,
            'adresse_gps' => $request->adresse_gps,
            'libelle' => $request->libelle,
            'unite_index' => $request->unite_index,
            'statut' => $statut,

        ]
    );

    return redirect('affiche_compteurCie');
    }

    public function affiche_compteurCie(){
        $compteurCies = Compteur_cie::all();
        return view('ensemble.affiche_compteurCie', compact('compteurCies'));
    }

    public function edit_compteurCie($id)
    {
        $compteurCie = Compteur_cie::find($id);
        return view('ensemble.edit_compteurCie', compact('compteurCie'));
    }

    public function update_compteurCie(Request $request, $id)
    {
        $compteurCie = Compteur_cie::find($id);
        $compteurCie->denomination = $request->input('denomination');
        $compteurCie->index_dbt = $request->input('index_dbt');
        $compteurCie->index_fn = $request->input('index_fn');
        $compteurCie->som_total = $request->input('som_total');
        $compteurCie->adresse_gps = $request->input('adresse_gps');
        $compteurCie->libelle = $request->input('libelle');
        $compteurCie->unite_index = $request->input('unite_index');
        $compteurCie->statut = $request->input('statut');
        $compteurCie->update();
        return redirect('affiche_compteurCie');
    }

    public function destroy_cie($id)
    {
        $compteurCies = Compteur_cie::find($id)->delete();
        return redirect('affiche_compteurCie');
    }

    public function paiement_index_cie($id){
        $compteurCies = Compteur_cie::find($id);
        return view('ensemble.paiement_index_cie', compact('compteurCies'));
    }

    public function paiement_index_cie_payer(Request $request, $id){
        $zero = 0;
        $caisses = Caisse::all();
        $mytime = Carbon::now();
        $compteurCie = Compteur_cie::find($id);
        $compteurCie->index_dbt = $request->input('index_fn');
        $compteurCie->index_fn = $zero;
        $compteurCie->mois_payer=NULL;
        $compteurCie->som_total = $request->input('somme_restant');
        $compteurCie->somme_restant = $request->input('somme_restant');
        $compteurCie->update();
        $id_ordonnacement = $request->input('id_ordonnacement');

        DB::table('ciepaiements')->insert(['index_dbt'=>$request->input('index_dbt'), 'index_fn'=>$request->input('index_fn'),'date_payement'=>$mytime->toDateTimeString() ,'somme_payer'=>$request->input('somme_payer'),'somme_restant'=>$request->input('somme_restant'),'mois_payer'=>$request->input('mois_payer'),'code_locataire'=>$request->input('code_locataire'),'code_contrat'=>$request->input('code_contrat'),'compteur_cie_id'=>$id]);
        $code = $request->input('code');
        DB::table('ordonnacement_cies')->where('id', '=' , $id_ordonnacement)->update(['statut'=>1]);

        DB::table('caisses')->where('date_payement', date('Y-m-d'))->insert(['somme_total_paiement_effectuer'=>$request->input('somme_payer')+$caisses->sum('somme_payer'),'somme_payer'=>$request->input('somme_payer'),'date_payement'=>$mytime->toDateTimeString(),'motif'=>$request->input('motif'), 'ciepaiement_id'=>$id]);

        DB::table('compteur_cies')->where('id', '=' , $id)->update(['statut_ordonnacement'=>0]);
        //return redirect('paiement_cie');
        return redirect()->route('contrat_recu', $id);
        // return redirect()->route('paiement_index_cie', $id);


    }

    public function regler_index_cie2($id){
        $compteurCies = Compteur_cie::find($id);
        return view('ensemble.regler_index_cie2', compact('compteurCies'));
    }

    public function regler_index_cie_payer2(Request $request, $id){
        $compteurCie = Compteur_cie::find($id);
        $compteurCie->index_dbt = $request->input('index_dbt');
        $compteurCie->index_fn = $request->input('index_fn');
        $compteurCie->mois_payer = $request->input('mois_payer');
        $compteurCie->update();
        //return view('ensemble.affiche_contrat_index');
        return redirect()->route('affiche_compteurCie', $id);
    }


    public function paiement_cie_payer(Request $request, $id){
        $compteurCies = CompteurCie::find($id);
        $compteurCies->som_toto = $request->input('som_restant_ouverture');
        $compteurCies->update();
        return redirect()->route('contrat_recu', $id);
        //return view('ensemble.paiement');
    }

    public function paiement_cie(){
        $compteurCies = Compteur_cie::all();
        // foreach($compteurCies as $compteurCie){
        // foreach($compteurCie->ordonnacement_cies as $ordonnacement_cie){
        // dd($ordonnacement_cie->statut==0);
        // }}
        return view('ensemble.paiement_cie', compact('compteurCies'));
    }
}
