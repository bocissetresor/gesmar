<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locataire extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'nom', 'denomination', 'type', 'adresse_postale', 'ville','tel' ,'statut'];

}
