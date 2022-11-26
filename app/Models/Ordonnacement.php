<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnacement extends Model
{
    use HasFactory;
    protected $fillable = ['code','date_ordonnacement', 'somme_ordonnacement', 'commentaire'];

    // public function ordonnacement_contrats1(){
    //     return $this->hasOne(Ordonnacement::class);
    // }
}
