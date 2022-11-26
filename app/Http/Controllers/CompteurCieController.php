<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompteurCie;

class CompteurCieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_compteurCie(){
        return view('ensemble.creat_compteurCie');
    }



     public function store(Request $request){

        $compteurCies = CompteurCie::all();
        $nbr = $compteurCies->count();
        $cod='compteurCie-'.sprintf("%06d",((int)$nbr+1));

        $statut = 0;

        $post = CompteurCie::create([
            'code' => $cod,
            'denomination' => $request->denomination,
            'index_dbt' =>$request->index_dbt,
            'index_fn' =>$request->index_fn,
            'som_total' =>$request->som_total,
            'adresse_gps' => $request->adresse_gps,
            'libelle' => $request->libelle,
            'statut' => $statut,

        ]
    );

    return redirect('affiche_compteurCie');
    }

    public function affiche_compteurCie(){
        $compteurCies = CompteurCie::all();
        return view('ensemble.affiche_compteurCie', compact('compteurCies'));
    }

    public function edit_compteurCie($id)
    {
        $compteurCie = CompteurCie::find($id);
        return view('ensemble.edit_compteurCie', compact('compteurCie'));
    }

    public function update_compteurCie(Request $request, $id)
    {
        $compteurCie = CompteurCie::find($id);
        $compteurCie->denomination = $request->input('denomination');
        $compteurCie->index_dbt = $request->input('index_dbt');
        $compteurCie->index_fn = $request->input('index_fn');
        $compteurCie->som_total = $request->input('som_total');
        $compteurCie->adresse_gps = $request->input('adresse_gps');
        $compteurCie->libelle = $request->input('libelle');
        $compteurCie->statut = $request->input('statut');
        $compteurCie->update();
        return redirect('affiche_compteurCie');
    }

    public function destroy($id)
    {
        $compteurCies = CompteurCie::find($id)->delete();
        return redirect('affiche_compteurCie');
    }
}
