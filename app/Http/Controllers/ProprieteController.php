<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propriete;
use App\Models\locataire;
use App\Models\Emplacement;
use App\Models\contrat;
use App\Models\Caisse;
use DB;
use Carbon\Carbon;


class ProprieteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_propriete()
    {
    $locataires = locataire::all();
    $emplacements = Emplacement::all();
    $contrats = contrat::all();
    return view('ensemble.creat_propriete', compact('locataires','emplacements','contrats'));
    }



     public function store(Request $request){

        $proprietes = Propriete::all();
        $nbr = $proprietes->count();
        $cod='PROPRIETE-'.sprintf("%06d",((int)$nbr+1));

        $statut = 0;

        $post = Propriete::create([
            'code' => $cod,
            'denomination' => $request->denomination,
            'adresse_gps' => $request->adresse_gps,
            'libelle' => $request->libelle,
            'statut' => $statut,
            'index_dbt' =>$request->index_dbt,
            'index_fn' =>$request->index_fn,
            'unite_index' => $request->unite_index,
            'som_total' =>$request->som_total,
        ]
    );

    return redirect('affiche_propriete');
    }

    public function affiche_propriete(){
        $proprietes = Propriete::all();
        return view('ensemble.affiche_propriete', compact('proprietes'));
    }

    public function edit_propriete($id)
    {
        $propriete = Propriete::find($id);
        return view('ensemble.edit_propriete', compact('propriete'));
    }

    public function update_propriete(Request $request, $id)
    {


        $propriete = Propriete::find($id);
        $propriete->denomination = $request->input('denomination');
        $propriete->libelle = $request->input('libelle');
        $propriete->adresse_gps = $request->input('adresse_gps');
        $propriete->statut = $request->input('statut');
        $propriete->index_dbt = $request->input('index_dbt');
        $propriete->index_fn = $request->input('index_fn');
        $propriete->som_louer = $request->input('som_louer');
        $propriete->som_total = $request->input('som_total');
        $propriete->update();
        return redirect('affiche_propriete');
    }

    public function destroy_equipement($id)
    {
        $proprietes = Propriete::find($id)->delete();
        return redirect('affiche_propriete');
    }

    public function regler_index_equipement($id){
        $proprietes = Propriete::find($id);
        return view('ensemble.regler_index_equipement', compact('proprietes'));
    }

    public function regler_index_equipement_payer(Request $request, $id){
        $propriete = Propriete::find($id);
        $propriete->index_dbt = $request->input('index_dbt');
        $propriete->index_fn = $request->input('index_fn');
        $propriete->mois_payer = $request->input('mois_payer');
        $propriete->update();
        //return view('ensemble.affiche_contrat_index');
        return redirect()->route('affiche_propriete', $id);
    }

    public function paiement_index_equipement($id){
        $proprietes = Propriete::find($id);
        return view('ensemble.paiement_index_equipement', compact('proprietes'));
    }

    public function paiement_index_equipement_payer(Request $request, $id){
        $mytime = Carbon::now();
        $caisses = Caisse::all();
        $propriete = Propriete::find($id);
        $propriete->index_dbt = $request->input('index_fn');
        $propriete->index_fn = 0;
        $propriete->som_total = $request->input('somme_restant');
        $propriete->somme_restant = $request->input('somme_restant');
        $propriete->update();
        DB::table('proprietepaiements')->insert(['index_dbt'=>$request->input('index_dbt'), 'index_fn'=>$request->input('index_fn'), 'date_payement'=>$mytime->toDateTimeString() ,'somme_payer'=>$request->input('somme_payer'),'somme_restant'=>$request->input('somme_restant'),'mois_payer'=>$request->input('mois_payer'),'code_contrat'=>$request->input('code_contrat'),'propriete_id'=>$id]);
        //return view('ensemble.affiche_contrat_index');

        $id_ordonnacement = $request->input('id_ordonnacement');
        DB::table('ordonnacement_proprietes')->where('id', '=' , $id_ordonnacement)->update(['statut'=>1]);

        DB::table('caisses')->where('date_payement', date('Y-m-d'))->insert(['somme_total_paiement_effectuer'=>$request->input('somme_payer')+$caisses->sum('somme_payer'),'somme_payer'=>$request->input('somme_payer'),'date_payement'=>$mytime->toDateTimeString(),'motif'=>$request->input('motif'), 'proprietepaiement_id'=>$id]);

        DB::table('proprietes')->where('id', '=' , $id)->update(['statut_ordonnacement'=>0]);

        //return redirect()->route('paiement_index_equipement', $id);
        return redirect()->route('contrat_recu', $id);
    }

    public function paiement_equipement(){
        $proprietes = Propriete::all();
        return view('ensemble.paiement_equipement', compact('proprietes'));
    }
}
