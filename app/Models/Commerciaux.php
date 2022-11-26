<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerciaux extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'denomination','code', 'type','adresse_postale','ville', 'tel', 'statut', 'encaissement'];
    public function commerciauxs(){
        return $this->hasOne(Etales::class);
    }
}
