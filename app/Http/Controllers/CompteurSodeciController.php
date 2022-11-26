<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompteurSodeci;

class CompteurSodeciController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_compteurSodeci(){
        return view('ensemble.creat_compteurSodeci');
    }



     public function store(Request $request){

        $compteurSodecis = CompteurSodeci::all();
        $nbr = $compteurSodecis->count();
        $cod='compteurSodeci-'.sprintf("%06d",((int)$nbr+1));

        $statut = 0;

        $post = CompteurSodeci::create([
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

    return redirect('affiche_compteurSodeci');
    }

    public function affiche_compteurSodeci(){
        $compteurSodecis = CompteurSodeci::all();
        return view('ensemble.affiche_compteurSodeci', compact('compteurSodecis'));
    }

    public function edit_compteurSodeci($id)
    {
        $compteurSodeci = CompteurSodeci::find($id);
        return view('ensemble.edit_compteurSodeci', compact('compteurSodeci'));
    }

    public function update_compteurSodeci(Request $request, $id)
    {
        $compteurSodeci = CompteurSodeci::find($id);
        $compteurSodeci->denomination = $request->input('denomination');
        $compteurSodeci->index_dbt = $request->input('index_dbt');
        $compteurSodeci->index_fn = $request->input('index_fn');
        $compteurSodeci->som_total = $request->input('som_total');
        $compteurSodeci->adresse_gps = $request->input('adresse_gps');
        $compteurSodeci->libelle = $request->input('libelle');
        $compteurSodeci->statut = $request->input('statut');
        $compteurSodeci->update();
        return redirect('affiche_compteurSodeci');
    }

    public function destroy($id)
    {
        $compteurSodecis = CompteurSodeci::find($id)->delete();
        return redirect('affiche_compteurSodeci');
    }
}
