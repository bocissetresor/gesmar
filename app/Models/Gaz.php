<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaz extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'denomination','adresse_gps', 'index_dbt', 'index_fn', 'som_total', 'libelle', 'statut', 'som_louer'];

    public function ordonnacement_gazs(){
        return $this->hasMany(Ordonnacement_gaz::class);
    }

    public function Gazs(){
        return $this->belongsToMany(contrat::class, 'gaz_contrat')->withTimestamps();
    }
}
