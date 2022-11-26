<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batiment;
use App\Models\Emplacement;
use App\Models\Etage;
use App\Models\Site;
use App\Models\Zone;

class AfficheController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function affiche(Request $request){
        $sites = Site::all();
        echo $this->getUserIpAddr();

        return view('ensemble.affiche', [
            'sites'=>$sites,
        ]);
    }

    public function edit_site($id)
    {
        $site = Site::find($id);
        return view('ensemble.edit_site', compact('site'));
    }

    public function update_site(Request $request, $id)
    {
        $site = Site::find($id);
        $site->designation = $request->input('designation');
        $site->adresse_graphique = $request->input('adresse_graphique');
        $site->adresse_postale = $request->input('adresse_postale');
        $site->type = $request->input('type');
        $site->ville = $request->input('ville');
        $site->commune = $request->input('commune');
        $site->update();
        return redirect('affiche');
    }

    public function destroy($id)
    {
        $sites = Site::find($id)->delete();
        return redirect('affiche');
    }


    public function getUserIpAddr(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
     }

}
