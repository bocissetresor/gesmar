<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compteur_sodeci;
use App\Models\Caisse;
use DB;
use Carbon\Carbon;


class Compteur_sodeciController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_compteurSodeci(){
        return view('ensemble.creat_compteurSodeci');
    }



     public function store(Request $request){

        $compteurSodecis = Compteur_sodeci::all();
        $nbr = $compteurSodecis->count();
        $cod='compteurSodeci-'.sprintf("%06d",((int)$nbr+1));

        $statut = 0;

        $post = Compteur_sodeci::create([
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

    return redirect('affiche_compteurSodeci');
    }

    public function affiche_compteurSodeci(){
        $compteurSodecis = Compteur_sodeci::all();
        return view('ensemble.affiche_compteurSodeci', compact('compteurSodecis'));
    }

    public function edit_compteurSodeci($id)
    {
        $compteurSodeci = Compteur_sodeci::find($id);
        return view('ensemble.edit_compteurSodeci', compact('compteurSodeci'));
    }

    public function update_compteurSodeci(Request $request, $id)
    {
        $compteurSodeci = Compteur_sodeci::find($id);
        $compteurSodeci->denomination = $request->input('denomination');
        $compteurSodeci->index_dbt = $request->input('index_dbt');
        $compteurSodeci->index_fn = $request->input('index_fn');
        $compteurSodeci->som_total = $request->input('som_total');
        $compteurSodeci->adresse_gps = $request->input('adresse_gps');
        $compteurSodeci->libelle = $request->input('libelle');
        $compteurSodeci->unite_index = $request->input('unite_index');
        $compteurSodeci->statut = $request->input('statut');
        $compteurSodeci->update();
        return redirect('affiche_compteurSodeci');
    }

    public function destroy_sodeci($id)
    {
        $compteurSodecis = Compteur_sodeci::find($id)->delete();
        return redirect('affiche_compteurSodeci');
    }

    public function regler_index_sodeci($id){
        $compteurSodecis = Compteur_sodeci::find($id);
        return view('ensemble.regler_index_sodeci', compact('compteurSodecis'));
    }

    public function regler_index_sodeci_payer(Request $request, $id){


        $compteurSodeci = Compteur_sodeci::findOrFail($id);
        $compteurSodeci->index_dbt = $request->input('index_dbt');
        $compteurSodeci->index_fn = $request->input('index_fn');
        $compteurSodeci->mois_payer = $request->input('mois_payer');
        $compteurSodeci->update();
        //return view('ensemble.affiche_contrat_index');
        return redirect()->route('affiche_compteurSodeci', $id);
    }

    public function paiement_index_sodeci($id){
        $compteurSodecis = Compteur_sodeci::find($id);
        return view('ensemble.paiement_index_sodeci', compact('compteurSodecis'));
    }

    public function paiement_index_sodeci_payer(Request $request, $id){
        $mytime = Carbon::now();
        $caisses = Caisse::all();
        $CompteurSodeci = Compteur_sodeci::find($id);
        $CompteurSodeci->index_dbt = $request->input('index_fn');
        $CompteurSodeci->index_fn = 0;
        $CompteurSodeci->som_total = $request->input('somme_restant');
        $CompteurSodeci->somme_restant = $request->input('somme_restant');
        $CompteurSodeci->update();
        DB::table('sodecipaiements')->insert(['index_dbt'=>$request->input('index_dbt'),'date_payement'=>$mytime->toDateTimeString() ,'index_fn'=>$request->input('index_fn'),'somme_payer'=>$request->input('somme_payer'),'somme_restant'=>$request->input('somme_restant'),'mois_payer'=>$request->input('mois_payer'),'code_contrat'=>$request->input('code_contrat'),'compteur_sodeci_id'=>$id]);
        //return view('ensemble.affiche_contrat_index');

        $id_ordonnacement = $request->input('id_ordonnacement');
        DB::table('ordonnacement_sodecis')->where('id', '=' , $id_ordonnacement)->update(['statut'=>1]);

        DB::table('caisses')->where('date_payement', date('Y-m-d'))->insert(['somme_total_paiement_effectuer'=>$request->input('somme_payer')+$caisses->sum('somme_payer'),'somme_payer'=>$request->input('somme_payer'),'date_payement'=>$mytime->toDateTimeString(),'motif'=>$request->input('motif'), 'sodecipaiement_id'=>$id]);

        DB::table('compteur_Sodecis')->where('id', '=' , $id)->update(['statut_ordonnacement'=>0]);
        //return redirect()->route('paiement_sodeci');
        return redirect()->route('contrat_recu', $id);
    }

    public function affiche_index_sodeci(){
        $compteurSodecis = Compteur_sodeci::all();
        return view('ensemble.affiche_index_sodeci', compact('compteurSodecis'));
    }

    public function paiement_sodeci(){
        $compteurSodecis = Compteur_sodeci::all();
        return view('ensemble.paiement_sodeci', compact('compteurSodecis'));
    }
}
