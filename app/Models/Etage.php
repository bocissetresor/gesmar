<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etage extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'designation', 'batiment_id'];
    public function batiment(){
        return $this->belongsTo(Batiment::class);
    }
}
