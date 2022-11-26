<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplacement extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'designation', 'zone_id', 'superficie', 'loyer', 'pas_porte', 'statut','type_emplacement'];

    public function zone(){
        return $this->belongsTo(Zone::class);
    }

    // public function emplacement_contrats(){
    //     return $this->belongsTo(Batiment::class);
    // }

    public function emplacement_contrats()
    {
        return $this->belongsTo(contrat::class, 'emplacement_contrat');
    }
}
