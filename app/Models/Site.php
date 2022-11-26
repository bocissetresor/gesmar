<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'designation', 'adresse_graphique', 'adresse_postale', 'type', 'ville', 'commune'];

    // public function bat()
    // {
    //     return $this->hasMany(Batiment::class);
    //     //$this->belongsTo('\App\Models\Site');
    // }
}
