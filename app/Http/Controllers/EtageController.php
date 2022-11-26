<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batiment;
use App\Models\Etage;

class EtageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_etage($id)
    {
        $batiments = Batiment::find($id);
        return view('ensemble.creat_etage', ['batiments'=>$batiments]);
    }

    public function store(Request $request, $id){

        $request->validate([
            // 'code' => 'required',
            'designation' => 'required',
            //'batiment_id' => 'required'
        ]);

        $etages = Etage::all();
        $nbr = $etages->count();
        $cod='ETAGE-'.sprintf("%06d",((int)$nbr+1));

        // $etage = Etage::find($id);
        // $batiment_id= $etage->batiment_id;
        $batiment_id = request()->id;

        $etage = Etage::create([
            'code' => $cod,
            'designation' => $request->designation,
            'batiment_id'=>$batiment_id,
        ]);
        return redirect()->route('affiche_etage', $id);

    }

    public function affiche_etage($id){
        $etages = Etage::with('batiment')->where('batiment_id', '=', $id)->get();
        $batiments = Batiment::find($id);
        return view('ensemble.affiche_etage', [
            'etages'=>$etages,
            'batiments'=>$batiments,
        ]);
    }

    public function edit_etage($id)
    {
        $etage = Etage::find($id);
        $batiments = Batiment::all();
        return view('ensemble.edit_etage', compact('etage','batiments'));
    }

    public function update_etage(Request $request, $id)
    {
        $etage = Etage::find($id);
        $etage->designation = $request->input('designation');
        $etage->batiment_id = $request->input('batiment_id');
        $etage->update();
        return redirect('affiche_etage/'.$etage->batiment_id);
    }

    public function destroy($id)
    {
        $etage = Etage::find($id);
        $etage_id = $etage->batiment_id;
        $etages = Etage::find($id)->delete();
        return redirect('affiche_etage/'.$etage_id);
    }
}
