<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compteur_sodeci extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'denomination', 'index_dbt', 'index_fn', 'som_total', 'adresse_gps', 'libelle', 'statut', 'som_louer', 'mois_payer'];

    public function ordonnacement_sodecis(){
        return $this->hasMany(Ordonnacement_sodeci::class);
    }

    public function Compteur_Sodecis(){
        return $this->belongsToMany(contrat::class, 'compteur_sodeci_contrat')->withTimestamps();
    }
}
