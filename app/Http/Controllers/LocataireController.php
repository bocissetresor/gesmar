<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locataire;
use DB;

class LocataireController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_locataire()
    {
        return view('ensemble.creat_locataire');
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
            'statut' => 'required'

        ]);

        $locataires = Locataire::all();
        $nbr = $locataires->count();
        $cod='LOCATAIRE-'.sprintf("%06d",((int)$nbr+1));

        $post = Locataire::create([
            'code' => $cod,
            'nom' => $request->nom,
            'denomination' => $request->denomination,
            'type' => $request->type,
            'adresse_postale' => $request->adresse_postale,
            'ville' => $request->ville,
            'tel' => $request->tel,
            'statut' => $request->statut
        ]);
        return redirect('ancien_client');
    }

    public function affiche_locataire(){
        $locataires = Locataire::all();
        return view('ensemble.ancien_client', [
            'locataires'=>$locataires,
        ]);
    }

    public function edit_locataire($id)
    {
        $locataire = Locataire::find($id);
        return view('ensemble.edit_locataire', compact('locataire'));
    }

    public function update_locataire(Request $request, $id)
    {
        $locataire = Locataire::find($id);
        $locataire->nom = $request->input('nom');
        $locataire->denomination = $request->input('denomination');
        $locataire->type = $request->input('type');
        $locataire->adresse_postale = $request->input('adresse_postale');
        $locataire->ville = $request->input('ville');
        $locataire->tel = $request->input('tel');
        $locataire->statut = $request->input('statut');
        $locataire->update();
        return redirect('ancien_client');
    }
    //public function supprimer_locataire

    public function destroy_($id)
    {
        //return $id;
        $locataires = Locataire::find($id)->delete();
        return redirect('ancien_client');
    }

    public function nouveau_client(){
        return view('ensemble.nouveau_client');
    }

    public function store1(Request $request){

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

        $locataires = Locataire::all();
        $nbr = $locataires->count();
        $cod='LOCATAIRE-'.sprintf("%06d",((int)$nbr+1));

        $post = Locataire::create([
            'code' => $cod,
            'nom' => $request->nom,
            'denomination' => $request->denomination,
            'type' => $request->type,
            'adresse_postale' => $request->adresse_postale,
            'ville' => $request->ville,
            'tel' => $request->tel,
            'statut' => 1
        ]);
        //return redirect()->route('affiche_nouveau_client', $cod);
        return redirect('ancien_client');
    }

    public function desactiver_locataire(Request $request, $id){
        //DB::table('locataires')->where('id', '=' , $id)->update(['statut'=>0]);
        $locataires = Locataire::find($id)->update(['statut'=>0]);
        return redirect('ancien_client');
    }

    public function activer_locataire(Request $request, $id){
        $locataires = Locataire::find($id)->update(['statut'=>1]);
        return redirect('ancien_client');
    }

    // public function show($code){
    //     $nouveau_clients = locataire::where('code', '=', $code)->get();
    //     //dd($nouveau_clients);
    //     return view('ensemble.affiche_nouveau_client', compact('nouveau_clients'));
    // }
}
