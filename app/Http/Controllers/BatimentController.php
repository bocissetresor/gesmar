<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batiment;
use App\Models\Site;

class BatimentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function batiment(){
        return view('ensemble.batiment');
    }

    public function creat_batiment($id)
    {
        $sites = Site::find($id);
        return view('ensemble.creat_batiment', ['sites'=>$sites]);
    }

    public function store(Request $request, $id){

        $request->validate([
            // 'code' => 'required',
            'designation' => 'required',
            //'site_id' => 'required'
        ]);

        $batiments = Batiment::all();
        $nbr = $batiments->count();
        $cod='BAT-'.sprintf("%06d",((int)$nbr+1));

        $site_id = request()->id;

        $batiment = Batiment::create([
            'code' => $cod,
            'designation' => $request->designation,
            'site_id'=>$site_id,
        ]);

        return redirect()->route('affiche_batiment', $id);
    }

    public function affiche_batiment($id){
        $batiments = Batiment::with('site')->where('site_id', '=', $id)->get();
        $sites = Site::find($id);
        return view('ensemble.affiche_batiment', [
            'batiments'=>$batiments,
            'sites'=>$sites,
        ]);
    }

    public function essai(){
        $bats = Batiment::find(1);
        $sites_id = $bats->sit;

        return view('ensemble.essai', [

            'sites_id'=>$bats->sit
        ]);

    }

    public function edit_batiment($id)
    {
        $batiment = Batiment::find($id);
        $sites = Site::all();
        return view('ensemble.edit_batiment', compact('batiment','sites'));
    }

    public function update_batiment(Request $request, $id)
    {
        $batiment = Batiment::find($id);
        $batiment->designation = $request->input('designation');
        $batiment->site_id = $request->input('site_id');
        $batiment->update();
        return redirect('affiche_batiment/'.$batiment->site_id);
    }

    public function destroy($id)
    {
        $batiment = Batiment::find($id);
        $bat_id =$batiment->site_id;
        $batiments = Batiment::find($id)->delete();
        return redirect('affiche_batiment/'.$bat_id);

    }



}
