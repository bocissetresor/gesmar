<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaz;
use App\Models\contrat;
use App\Models\Caisse;
use DB;
use Carbon\Carbon;

class GazController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_gaz(){
        return view('ensemble.creat_gaz');
    }



     public function store(Request $request){

        $gazs = Gaz::all();
        $nbr = $gazs->count();
        $cod='gaz-'.sprintf("%06d",((int)$nbr+1));

        $statut = 0;

        $post = Gaz::create([
            'code' => $cod,
            'denomination' => $request->denomination,
            'adresse_gps' => $request->adresse_gps,
            'index_dbt' =>$request->index_dbt,
            'index_fn' =>$request->index_fn,
            'som_total' =>$request->som_total,
            'unite_index' =>$request->unite_index,
            'libelle' => $request->libelle,
            'statut' => $statut,

        ]
    );

    return redirect('affiche_gaz');
    }

    public function affiche_gaz(){
        $gazs = Gaz::all();
        return view('ensemble.affiche_gaz', compact('gazs'));
    }

    public function edit_gaz($id)
    {
        $gaz = Gaz::find($id);
        return view('ensemble.edit_gaz', compact('gaz'));
    }

    public function update_gaz(Request $request, $id)
    {
        $gaz = Gaz::find($id);
        $gaz->denomination = $request->input('denomination');
        $gaz->adresse_gps = $request->input('adresse_gps');
        $gaz->index_dbt = $request->input('index_dbt');
        $gaz->index_fn = $request->input('index_fn');
        $gaz->som_total = $request->input('som_total');
        $gaz->unite_index = $request->input('unite_index');
        $gaz->libelle = $request->input('libelle');
        $gaz->statut = $request->input('statut');
        $gaz->update();
        return redirect('affiche_gaz');
    }

    public function destroy($id)
    {
        $gazs = Gaz::find($id)->delete();
        return redirect('affiche_gaz');
    }

    public function regler_index_gaz($id){
        $gazs = Gaz::find($id);
        return view('ensemble.regler_index_gaz', compact('gazs'));
    }

    public function regler_index_gaz_payer(Request $request, $id){
        $gaz = Gaz::find($id);
        $gaz->index_dbt = $request->input('index_dbt');
        $gaz->index_fn = $request->input('index_fn');
        $gaz->mois_payer = $request->input('mois_payer');
        $gaz->update();
        return redirect()->route('affiche_gaz', $id);
    }

    public function paiement_index_gaz($id){
        $gazs = Gaz::find($id);
        //dd($gazs);
        return view('ensemble.paiement_index_gaz', compact('gazs'));
    }

    public function paiement_index_gaz_payer(Request $request, $id){
        $mytime = Carbon::now();
        $caisses = Caisse::all();
        $CompteurGaz = Gaz::find($id);
        $CompteurGaz->index_dbt = $request->input('index_fn');
        $CompteurGaz->index_fn = 0;
        $CompteurGaz->som_total = $request->input('somme_restant');
        $CompteurGaz->somme_restant = $request->input('somme_restant');
        $CompteurGaz->update();
        DB::table('gazpaiements')->insert(['index_dbt'=>$request->input('index_dbt'), 'index_fn'=>$request->input('index_fn'), 'date_payement'=>$mytime->toDateTimeString() ,'somme_payer'=>$request->input('somme_payer'),'somme_restant'=>$request->input('somme_restant'),'mois_payer'=>$request->input('mois_payer'), 'code_contrat'=>$request->input('code_contrat'),'gaz_id'=>$id]);
        //return view('ensemble.affiche_contrat_index');

        $id_ordonnacement = $request->input('id_ordonnacement');
        DB::table('ordonnacement_gazs')->where('id', '=' , $id_ordonnacement)->update(['statut'=>1]);

        DB::table('caisses')->where('date_payement', date('Y-m-d'))->insert(['somme_total_paiement_effectuer'=>$request->input('somme_payer')+$caisses->sum('somme_payer'),'somme_payer'=>$request->input('somme_payer'),'date_payement'=>$mytime->toDateTimeString(),'motif'=>$request->input('motif'), 'gazpaiement_id'=>$id]);

        DB::table('gazs')->where('id', '=' , $id)->update(['statut_ordonnacement'=>0]);

        //return redirect()->route('paiement_index_gaz', $id);
        return redirect()->route('contrat_recu', $id);
    }

    public function paiement_gaz(){
        $gazs = Gaz::all();
        return view('ensemble.paiement_gaz', compact('gazs'));
    }
}
