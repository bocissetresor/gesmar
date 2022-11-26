<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Etage;


class ZoneController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_zone($id)
    {
        $etages = Etage::find($id);
        return view('ensemble.creat_zone', ['etages'=>$etages]);
    }

    public function store(Request $request, $id){


        $request->validate([
            // 'code' => 'required',
            'designation' => 'required',
            //'etage_id' => 'required'
        ]);

        $zones = Zone::all();
        $nbr = $zones->count();
        $cod='ZONE-'.sprintf("%06d",((int)$nbr+1));

        // $zone = Zone::find($id);
        // $etage_id= $zone->etage_id;
        $etage_id = request()->id;

        $zone = Zone::create([
            'code' => $cod,
            'designation' => $request->designation,
            'etage_id'=>$etage_id,
        ]);
        return redirect()->route('affiche_zone', $id);

    }


    public function affiche_zone($id){
        $zones = Zone::with('etage')->where('etage_id', '=', $id)->get();
        $etages = Etage::find($id);
        return view('ensemble.affiche_zone', [
            'zones'=>$zones,
            'etages'=>$etages
        ]);
    }

    public function edit_zone($id)
    {
        $zone = Zone::find($id);
        $etages = Etage::all();
        return view('ensemble.edit_zone', compact('zone','etages'));
    }

    public function update_zone(Request $request, $id)
    {
        $zone = Zone::find($id);
        $zone->designation = $request->input('designation');
        $zone->etage_id = $request->input('etage_id');
        $zone->update();
        return redirect('affiche_zone/'. $zone->etage_id);
    }

    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone_id = $zone->etage_id;
        $zones = Zone::find($id)->delete();
        return redirect('affiche_zone/'.$zone_id);
    }
}

