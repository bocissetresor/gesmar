<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commerciaux;
use App\Models\Etales;
use DB;
use App\Models\Emplacement;

class CommerciauxController extends Controller
{
    public function affiche_commerciaux(){
        $commerciauxs = Commerciaux::all();
        return view('ensemble.affiche_commerciaux', compact('commerciauxs'));
    }

    public function generer_bordereaux($id){
        //$etales = Etales::All()->where('commerciaux_id', '=', $id);
        //$etales = DB::table('etales')->select('code','designation')->where('id', '=' , $id);
        $commerciaux_id = $id;
        $update_bordereaux = DB::update('CALL update_bordereaux(?)',[
            $commerciaux_id,
        ]);
        //return view('ensemble.generer_bordereaux', compact('etales'));
        return redirect('affiche_commerciaux');
    }

    public function regler_pass(Request $request, $id){
        $etales = Etales::find($id);
        return view('ensemble.regler_pass', compact('etales'));
    }

    public function regler_pass_payer(Request $request){
        $etale_id = $request->input('etale_id');
        $commerciaux_id = $request->input('commercial_id');
        $commerciaux_encai = Commerciaux::find($commerciaux_id);
        DB::table('etales')->where('id', '=' , $etale_id)->update(['pass'=>$request->input('somme_restant'),'statut'=>1]);
        DB::table('commerciauxes')->where('id', '=' , $commerciaux_id)->update(['encaissement'=>$request->input('somme_payer')+$commerciaux_encai->encaissement]);
        return redirect()->route('generer_bordereaux', $commerciaux_id);

    }



   /*  public function creat_commerciaux_(Request $request){
        return $request;
        DB::insert('CALL creat_commerciaux(?,?,?,?,?,?)',[
            $nom = $request->nom,
            $denomination = $request->denomination,
            $type = $request->type,
            $adresse_postale = $request->adresse_postale,
            $ville = $request->ville,
            $tel = $request->tel,
        ]);
        redirect('affiche_commerciaux');
    } */

    public function creat_commerciaux(){
        return view('ensemble.creat_commerciaux');
    }

    public function store(Request $request){

        $request->validate([
            //'code' => 'required',
            //'cod' => 'required',
            'nom' => 'required',
            'denomination' => 'required',
            'type' => 'required',
            'adresse_postale' => 'required',
            'ville' => 'required',
            'tel' => 'required',

        ]);

        $commerciaux = Commerciaux::all();
        $nbr = $commerciaux->count();
        $cod='COMMERCIO-'.sprintf("%06d",((int)$nbr+1));

        $post = Commerciaux::create([
            'code' => $cod,
            'nom' => $request->nom,
            'denomination' => $request->denomination,
            'type' => $request->type,
            'adresse_postale' => $request->adresse_postale,
            'ville' => $request->ville,
            'tel' => $request->tel,
            'statut' => 1,
            'created_at'=>now()
        ]);
        //return redirect()->route('affiche_nouveau_client', $cod);
        return redirect('affiche_commerciaux');
    }

    public function destroy($id)
    {
        //return $id;
        $Commerciaux = Commerciaux::find($id)->delete();
        return redirect('affiche_commerciaux');
    }

    public function edit_commerciaux($id)
    {
        $commerciaux = Commerciaux::find($id);
        return view('ensemble.edit_commerciaux', compact('commerciaux'));
    }

    public function update_commerciaux(Request $request, $id)
    {
        $commerciaux = Commerciaux::find($id);
        $commerciaux->nom = $request->input('nom');
        $commerciaux->denomination = $request->input('denomination');
        $commerciaux->type = $request->input('type');
        $commerciaux->adresse_postale = $request->input('adresse_postale');
        $commerciaux->ville = $request->input('ville');
        $commerciaux->tel = $request->input('tel');
        //$commerciaux->statut = $request->input('statut');

        $commerciaux->update();
        return redirect('affiche_commerciaux');
    }

    public function desactiver_commerciaux(Request $request, $id){
        //DB::table('commerciauxs')->where('id', '=' , $id)->update(['statut'=>0]);
        $commerciauxs = Commerciaux::find($id)->update(['statut'=>0]);
        return redirect('affiche_commerciaux');
    }

    public function activer_commerciaux(Request $request, $id){
        $commerciauxs = Commerciaux::find($id)->update(['statut'=>1]);
        return redirect('affiche_commerciaux');
    }

    public function affiche_box($id){
        //return $id;
        $emplacements = Emplacement::All()->where('type_emplacement', '=', 'Box');
        $commerciaux_id = $id;
        return view('ensemble.affiche_box', compact('emplacements', 'commerciaux_id'));
    }

    public function attribuer_emplacement(Request $request,$id){
        //DB::table('locataires')->where('id', '=' , $id)->update(['statut'=>0]);
        //return $id;
        $emplacement_id=$request->emplacement_id;
        $commerciaux_id = $request->commerciaux_id;
        return $emplacements = DB::update('CALL update_emplacement(?,?)',[
            $emplacement_id,
            $commerciaux_id

        ]);
        //$emplacement=Emplacement::find($id)->update(['commerciaux_id'=>$request->commerciaux_id]); 
        return redirect('affiche_box/'.$request->commerciaux_id);
    }

    public function commerciaux_voir_client(){
        $commerciauxs = Commerciaux::all();
        return view('ensemble.commerciaux_voir_client', compact('commerciauxs'));
    }
    public function commerciaux_voir_emplacement($id){
        //return $emplacements = Emplacement::find($id);
        $emplacements = Emplacement::All();
        $commercio_id = $id;
        //$emplacements =1;
        //return redirect()->route('commerciaux_voir_emplacement', $commercio_id);
        return view('ensemble.commerciaux_voir_emplacement', compact('emplacements','commercio_id'));
    }

    public function commerciaux_voir_emplacement_pay(Request $request,$id){
        $emplacement_id = $id;
        $commerciaux_id = $request->commerciaux_id;
        $payer = DB::update('CALL update_payer(?)',[
            $emplacement_id,
        ]);
        return redirect('commerciaux_voir_client');
    }

    public function commerciaux_voir_pay(){
        $commerciauxs = DB::select('CALL admin_get_commercio');
        return view('ensemble.commerciaux_voir_pay', compact('commerciauxs'));
    }

    public function affiche_resumer_comptable(){
        $get_tva = DB::select('CALL get_tva()');
        return view('ensemble.affiche_resumer_comptable', compact('get_tva'));
    }

    public function etat_lieux(){
        $dashboard = DB::select('CALL dashboard');
        return view('ensemble.etat_lieux', compact('dashboard'));
    }

    public function statistique_finance(){
       $dashboard = DB::select('CALL dashboard');
       $diagrame_mois = DB::select('CALL get_diagramme_par_mois');
       $get_cercle_mois =DB::select('CALL get_cercle_mois');
       $get_cercle_semaine =DB::select('CALL get_cercle_semaine');
    return view('ensemble.statistique_finance', compact('diagrame_mois', 'dashboard', 'get_cercle_mois','get_cercle_semaine'));
    }

    public function statistique_locataire(){
        $diagrame_mois=DB::select('CALL locataire_get_diagramme_par_mois');
        $dashboard = DB::select('CALL dashboard');
        $get_tva = DB::select('CALL get_tva');
    return view('ensemble.statistique_locataire', compact('diagrame_mois','dashboard', 'get_tva'));
    }

}
