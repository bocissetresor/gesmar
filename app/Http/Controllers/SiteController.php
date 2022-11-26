<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function creat_site()
    {

        return view('ensemble.creat_site');
    }

   

     public function store(Request $request){

        $request->validate([
            //'code' => 'required',
            //'cod' => 'required',
            'designation' => 'required',
            'adresse_graphique' => 'required',
            'adresse_postale' => 'required',
            'type' => 'required',
            'ville' => 'required',
            'commune' => 'required'

        ]);

        $sites = Site::all();
        $nbr = $sites->count();
        $cod='SITE-'.sprintf("%06d",((int)$nbr+1));

        $post = Site::create([
            'code' => $cod,
            'designation' => $request->designation,
            'adresse_graphique' => $request->adresse_graphique,
            'adresse_postale' => $request->adresse_postale,
            'type' => $request->type,
            'ville' => $request->ville,
            'commune' => $request->commune
            
        ]
    );
    return redirect('affiche');
    }

}
