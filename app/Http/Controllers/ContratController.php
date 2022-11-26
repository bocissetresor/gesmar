<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locataire;
use App\Models\contrat;
use App\Models\Emplacement;
use App\Models\Propriete;
use DB;
use App\Models\CompteurCie;
use App\Models\CompteurSodeci;
use App\Models\Gaz;
use Carbon\Carbon;
use PDF;
use App\Models\Ordonnacement;
use App\Models\Caisse;
use App\Models\Compteur_cie;

class ContratController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }



    public function remplie_contrat(Request $request, $id){
        $locataires= locataire::find($id);
        $locataires->code = $request->input('code');
        $locataires->denomination = $request->input('denomination');
        $locataires->tel = $request->input('tel');
        $locataires->adresse_postale = $request->input('adresse_postale');
        $locataires->save();
    }

    public function ancien_client(){
        // if(request()->code){
        //     echo 'hello';
        //     $locataires = locataire::where('code', 'like', request()->code)->paginate(4);
        // }
        // else{
        //     $locataires = locataire::paginate(4);
        // }
        $locataires = locataire::all();

        return view('ensemble.ancien_client', compact('locataires'));
    }


    public function formulaire_contrat($code){
        $locataires = locataire::where('code', $code)->first();
        $emplacements = Emplacement::all();
        $proprietes = Propriete::all();
        $gazs = Gaz::all();
        $compteurCies = CompteurCie::all();
        $compteurSodecis = CompteurSodeci::all();
        //dd($locataires);
        return view('ensemble.formulaire_contrat', ['locataires'=>$locataires, 'emplacements'=>$emplacements, 'proprietes'=>$proprietes, 'gazs'=>$gazs, 'compteurCies'=>$compteurCies, 'compteurSodecis'=>$compteurSodecis]);
    }

    public function store(Request $request){

        $request->validate([
            'type' => 'required',
            'date_debut' => 'required',
            //'ordonnancement' => 'ordonnancement',
        ]);

        $contrats = contrat::all();
        $nbr = $contrats->count();
        $cod='CONTRAT-'.sprintf("%06d",((int)$nbr+1));

        //$designation = 11;
        //dd(request()->all());
        $contrat = contrat::create([
            'code' => $cod,
            'date_debut' => $request->input('date_debut'),
            'type' => $request->type,
            'locataire_id' => $request->locataire_id,
            'code_locataire' => $request->input('code_locataire'),
            'nom_locataire' => $request->input('nom_locataire'),
            'adresse_postale' => $request->input('adresse_postale'),
            //'ordonnancement' => $request->input('ordonnancement'),
            'statut_buro1' => 1,
            //'emplacement_id' => $request->emplacements_id,
            //'designation_emplacement' => $designation,
        ]);

        foreach($request->emplacements_id as $emplacement){
            $contrat->emplacements()->attach($request->emplacements_id);
        }

        foreach($request->proprietes as $propriete){
            if ($propriete == '#')
                continue;
            else
                $contrat->proprietes()->attach($propriete);
                DB::table('proprietes')->where('id', $propriete)->update(['statut'=>1]);
        }

        foreach($request->gaz_id as $gaz){
            if ($gaz == '#')
                continue;
            else
                $contrat->gazs()->attach($gaz);
                DB::table('gazs')->where('id', $gaz)->update(['statut'=>1]);
        }

        foreach($request->compteur_cie_id as $compteurCie){
            if ($compteurCie == '#')
                continue;
            else
                $contrat->compteur_cies()->attach($compteurCie);
                DB::table('compteur_cies')->where('id', $compteurCie)->update(['statut'=>1]);
        }

        foreach($request->compteur_sodeci_id as $compteurSodeci){
            if ($compteurSodeci == '#')
                continue;
            else
                $contrat->compteur_sodecis()->attach($compteurSodeci);
                DB::table('compteur_sodecis')->where('id', $compteurSodeci)->update(['statut'=>1]);
        }

        DB::table('emplacements')->where('id', request('emplacements_id'))->update(['statut'=>1]);

        return redirect('affiche_contrat');
    }

    public function affiche_contrat(Request $request){
        $contrats = contrat::all();
        return view('ensemble.affiche_contrat', ['contrats'=>$contrats]);
    }

    public function edit_contrat ($id){
        //$contrats = contrat::find($id);
        $contrats = DB::select('CALL admin_update_contrat(?)',[
            $id
        ]);
        //$locataires = locataire::find($id);
        //return $contrats->code;
        $emplacements = Emplacement::all();
        $proprietes = Propriete::all();
        $gazs = Gaz::all();
        $compteurCies = Compteur_cie::all();
        //dd($compteurCies);
        $compteurSodecis = CompteurSodeci::all();
        return view('ensemble.edit_contrat', compact('contrats' , 'emplacements', 'proprietes', 'gazs', 'compteurCies', 'compteurSodecis'));
    }

    public function update_contrat(Request $request, $id)
    {
        $contrat = contrat::find($id);
        $contrat->date_debut = $request->input('date_debut');
        $contrat->type = $request->input('type');
        $contrat->code_locataire = $request->input('code_locataire');
        $contrat->nom_locataire = $request->input('nom_locataire');
        $contrat->adresse_postale = $request->input('adresse_postale');
        $contrat->compteur_cie_id = $request->input('compteur_cie_id');
        $contrat->update();
        return redirect('affiche_contrat');
    }

    public function destroy($id)
    {
        $contrats = contrat::find($id)->delete();
        return redirect('affiche_resumer_compte');
    }

    public function voir_contrat($id){
        $code_ = locataire::where('id', $id)->first();
        $code_locataire= $code_->code;
        $nom = $code_->nom;
        $denomination= $code_->denomination;
        $locataires = DB::select('CALL admin_get_contrat(?)',[
            $id
        ]);
        //return $locataires;
        return view('ensemble.voir_contrat', compact('locataires', 'code_locataire','nom','denomination'));
    }

    public function resumer_contrat($id){
        $contrats = contrat::find($id);
        return view('ensemble.resumer_contrat', compact('contrats'));
    }

    public function ordonnancement($id){
        $mytime = Carbon::now();
        $contrats = contrat::find($id);
        $locataires = locataire::find($id);
        $emplacements = Emplacement::find($id);
        $proprietes = Propriete::find($id);
        $gazs = Gaz::find($id);
        $compteurCies = CompteurCie::find($id);
        $compteurSodecis = CompteurSodeci::find($id);
        return view('ensemble.ordonnancement', compact('mytime','contrats', 'locataires', 'emplacements', 'proprietes', 'gazs', 'compteurCies', 'compteurSodecis'));
    }

    public function ordonnancement_buro2(Request $request, $id){

        $contrats = contrat::find($id);
        //$contrats->ordonnancement = $request->input('ordonnancement');
        $ordonnacement = Ordonnacement::all();
        $nbr = $ordonnacement->count();
        $cod='Ordonna-'.sprintf("%06d",((int)$nbr+1));
        foreach($request->date_ordonnacement as $key=>$date_ordonnacemen){
            DB::table('ordonnacements')->insert(['code'=>$cod,'date_ordonnacement'=>$date_ordonnacemen,'statut'=>0 ,'somme_ordonnacement'=>$request->somme_ordonnacement[$key], 'contrat_id'=>$id]);
        }

        $contrats->statut_buro2 = 1;
        //$contrats->som_toto = $contrats->proprietes->sum('som_louer')+$contrats->gazs->sum('som_louer')+$contrats->compteur_cies->sum('som_louer')+$contrats->compteur_sodecis->sum('som_louer')+$contrats->emplacements->sum('som_loyer')+$contrats->emplacements->sum('pas_porte');
        $contrats->som_toto = $contrats->emplacements->sum('loyer')+$contrats->emplacements->sum('pas_porte');
        $contrats->update();
        return redirect('affiche_contrat');
    }

    public function regler_facture_contrat(){
        $contrats = contrat::all();
        return view('ensemble.regler_facture_contrat', compact('contrats'));
    }

    public function regler_facture_contrat_buro3($id){
        $contrats = contrat::find($id);
        $locataires = locataire::find($id);
        $emplacements = Emplacement::all();
        return view('ensemble.regler_facture_contrat_buro3', compact('contrats', 'locataires', 'emplacements'));
    }

    public function regler_facture_contrat_buro3_payer(Request $request, $id){
        $mytime = Carbon::now();
        $caisses = Caisse::all();
        $ordonnacement = Ordonnacement::all();
        $contrats = contrat::find($id);
        $contrats->som_toto = $request->input('som_restant_ouverture');
        $contrats->som_payer_ouverture = $request->input('som_payer_ouverture');
        $contrats->som_restant_ouverture = $request->input('som_restant_ouverture');
        $contrats->statut_buro3 = 1;
        DB::table('loyers')->insert(['date_payement'=>$mytime->toDateTimeString(),'loyer_somme_payer'=>$request->input('som_payer_ouverture'),'somme_restant'=>$request->input('som_restant_ouverture'), 'contrat_id'=>$id]);


        // foreach ($contrats->ordonnacement_contrats as $ordonnacement_contrat){
        //     DB::table('ordonnacements')->where('$ordonnacement_contrat->date_ordonnacement', date('Y-m-d'))->update(['statut'=>1]);
        //     //dd($ordonnacement_contrat->date_ordonnacement);
        // }


        //if($caisses->date_payement->first() == $request->input('date_payement')->first()){
        DB::table('caisses')->where('date_payement', date('Y-m-d'))->insert(['somme_total_paiement_effectuer'=>$request->input('som_payer_ouverture')+$caisses->sum('somme_payer'),'somme_payer'=>$request->input('som_payer_ouverture'),'date_payement'=>$mytime->toDateTimeString(),'motif'=>$request->input('motif'), 'loyer_id'=>$id]);


        // $date = $request->input('date_ordonnacement');
        // DB::table('ordonnacements')->where('date_ordonnacement', '=', $date )->update(['statut'=>1]);

        $id_ordonnacement = $request->input('id_ordonnacement');
        DB::table('ordonnacements')->where('id', '=', $id_ordonnacement )->update(['statut'=>1]);



        $contrats->update();
        return redirect()->route('contrat_recu', $id);
    }

    public function contrat_recu($id){
        //$contrats = contrat::find($id);
        $contrats = DB::select('CALL admin_update_contrat(?)',[
            $id
        ]);
        return view('ensemble.contrat_recu', compact('contrats'));
    }

    public function affiche_resumer_compte(){
        $contrats = contrat::all();
        return view('ensemble.affiche_resumer_compte', compact('contrats'));
    }

    public function paiement(){
        $contrats = contrat::all();
        //$emplacements = Emplacement::all();
        return view('ensemble.paiement', compact('contrats'));
    }

    public function paiement_loyer($id){
        $contrats = contrat::find($id);
        return view('ensemble.paiement_loyer', compact('contrats'));
    }

    public function paiement_loyer_payer(Request $request, $id){
        $mytime = Carbon::now();
        $contrats = contrat::find($id);
        $contrats->som_toto = $request->input('som_restant_ouverture');
        $contrats->update();
        DB::table('loyers')->insert(['date_payement'=>$mytime->toDateTimeString(),'loyer_somme_payer'=>$request->input('som_payer_ouverture'),'somme_restant'=>$request->input('som_restant_ouverture'), 'contrat_id'=>$id]);
        //$date = $request->input('date_ordonnacement');
        $id_ordonnacement = $request->input('id_ordonnacement');
        DB::table('ordonnacement_mensuls')->where('id', '=', $id_ordonnacement )->update(['statut'=>1]);
        return redirect()->route('contrat_recu', $id);
        //return view('ensemble.paiement');
    }

    public function affiche_contrat_index(){
        $contrats = contrat::all();
        return view('ensemble.affiche_contrat_index', compact('contrats'));
    }

    public function affiche_contrat_index2(){
        $contrats = DB::select('CALL admin_get_contrat_list');
        return view('ensemble.affiche_contrat_index2', compact('contrats'));
    }

}
