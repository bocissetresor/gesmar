<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compteur_cie extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'denomination', 'index_dbt', 'index_fn', 'som_total', 'adresse_gps', 'libelle', 'statut', 'som_louer'];

    public function Compteur_Cies(){
        return $this->belongsToMany(contrat::class, 'compteur_cie_contrat')->withTimestamps();
    }

    public function ordonnacement_cies(){
        return $this->hasMany(Ordonnacement_cie::class);
    }


}
