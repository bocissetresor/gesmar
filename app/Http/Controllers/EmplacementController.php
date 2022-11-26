<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Emplacement;

class EmplacementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_emplacement($id)
    {
        $zones = Zone::find($id);
        return view('ensemble.creat_emplacement', ['zones'=>$zones]);
    }

    public function store(Request $request, $id){


        $request->validate([
            // 'code' => 'required',
            'designation' => 'required',
            //'zone_id' => 'required',
            'superficie' => 'required',
            'loyer' => 'required',
            'pas_porte' => 'required',
            'type_emplacement'=>'required',
        ]);

        $emplacements = Emplacement::all();
        $nbr = $emplacements->count();
        $cod='EMPLAC-'.sprintf("%06d",((int)$nbr+1));

        // $emplacement = Emplacement::find($id);
        // $zone_id= $emplacement->zone_id;
        $zone_id = request()->id;

        $emplacement = Emplacement::create([
            'code' => $cod,
            'designation' => $request->designation,
            'zone_id'=>$zone_id,
            'superficie'=>$request->superficie,
            'loyer'=>$request->loyer,
            'pas_porte'=>$request->pas_porte,
            'type_emplacement'=>$request->type_emplacement
        ]);
        return redirect()->route('affiche_emplacement', $id);
    }

    public function affiche_emplacement($id){
        $emplacements = Emplacement::with('zone')->where('zone_id', '=', $id)->get();
        $zones = Zone::find($id);
        return view('ensemble.affiche_emplacement', [
            'emplacements'=>$emplacements,
            'zones'=>$zones,
        ]);
    }

    public function affiche_emplacement1(){
        $emplacements = Emplacement::all();
        return view('ensemble.affiche_emplacement1', compact('emplacements'));
    }

    public function edit_emplacement($id)
    {
        $emplacement = Emplacement::find($id);
        $zones = Zone::all();
        return view('ensemble.edit_emplacement', compact('emplacement','zones'));
    }

    public function update_emplacement(Request $request, $id)
    {
        $emplacement = Emplacement::find($id);
        $emplacement->designation = $request->input('designation');
        $emplacement->superficie = $request->input('superficie');
        $emplacement->loyer = $request->input('loyer');
        $emplacement->pas_porte = $request->input('pas_porte');
        //$emplacement->batiment_id = $request->input('batiment_id');
        $emplacement->update();
        return redirect('affiche_emplacement/'.$emplacement->zone_id);
    }

    public function destroy($id)
    {
        $emplacement = Emplacement::find($id);
        $emplacement_id =$emplacement->zone_id;
        $emplacements = Emplacement::find($id)->delete();
        return redirect('affiche_emplacement/'.$emplacement_id);
    }
}
