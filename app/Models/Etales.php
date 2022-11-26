<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etales extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'designation', 'superficie','pass', 'statut', 'commerciaux_id'];
    public function etales(){
        return $this->belongsTo(Commerciaux::class);
    }
}
