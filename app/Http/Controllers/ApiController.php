<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClsResultFunction
{
    //
    public $bSuccess;
    public $message;
    public $objet;
    public function clsResultFunction(){
        $bSuccess = true;
        $message = "success";
    }
}

class ApiController extends Controller
{

    public function test(Request $request){
        return $code_emplacement = request()->get('test');
    }

    public function historique_paiement_(Request $request){
        $result = new clsResultFunction();

         
        $code_emplacement = $request->code_emplacement;
        $para1 = $code_emplacement;
        //appelle de la procedure
        $adresse = DB::select("CALL client_get_historique($para1)");

        $result->objet = $adresse;
            if(count($adresse)<=0)
            {
            $result->bSuccess=false;
            $result->message = "echec";
            }
            else
            {
            $result ->bSuccess=true;
            $result->message = "succes";
            }
            return response()->json($result);
    }

    public function parametre_paiement(Request $request){
        $result = new clsResultFunction();

         
         $code_emplacement = $request->code_emplacement;
        $para1 = $code_emplacement;
        //appelle de la procedure
        $adresse = DB::select("CALL client_get_info_paiement($para1)");

        $result->objet = $adresse;
            if(count($adresse)<=0)
            {
            $result->bSuccess=false;
            $result->message = "echec";
            }
            else
            {
            $result ->bSuccess=true;
            $result->message = "succes";
            }
            return response()->json($result);
    }
}
