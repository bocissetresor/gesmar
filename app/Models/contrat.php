<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contrat extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'date_debut', 'type', 'locataire_id','code_locataire', 'nom_locataire', 'adresse_postale', 'emplacement_id', 'designation_emplacement', 'statut_buro1', 'statut_buro2', 'ordonnancement', 'statut_buro3', 'som_cie', 'som_sodeci', 'som_gaz', 'som_equipement', 'som_toto'];

    public function proprietes(){
        return $this->belongsToMany(Propriete::class, 'proprietes_contrats')->withTimestamps();
    }

    public function emplacements(){
        return $this->belongsToMany(Emplacement::class, 'emplacement_contrat')->withTimestamps();
    }

    public function gazs(){
        return $this->belongsToMany(Gaz::class, 'gaz_contrat')->withTimestamps();
    }

    public function compteur_cies(){
        return $this->belongsToMany(Compteur_cie::class, 'compteur_cie_contrat')->withTimestamps();
    }

    public function compteur_sodecis(){
        return $this->belongsToMany(Compteur_sodeci::class, 'compteur_sodeci_contrat')->withTimestamps();
    }

    public function loyer_loyer(){
        return $this->hasMany(Loyer::class);
    }

    public function contrat(){
        return $this->belongsTo(Compteur_sodeci::class, 'compteur_sodeci_contrat')->withTimestamps();
    }

    public function ordonnacement_contrat_loyers(){
        return $this->hasMany(Ordonnacement_mensul::class);
    }

    public function ordonnacement_contrats(){
        return $this->hasMany(Ordonnacement::class);
    }

}
