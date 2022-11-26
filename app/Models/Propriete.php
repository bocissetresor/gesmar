<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriete extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'denomination', 'index_dbt', 'index_fn', 'som_total', 'libelle', 'statut', 'prix_mois', 'som_louer'];

    public function ordonnacement_proprietes(){
        return $this->hasMany(Ordonnacement_propriete::class);
    }

    public function Proprietes(){
        return $this->belongsToMany(contrat::class, 'proprietes_contrats')->withTimestamps();
    }
}

