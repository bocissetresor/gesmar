<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteurSodeci extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'denomination', 'index_dbt', 'index_fn', 'som_total', 'adresse_gps', 'libelle', 'statut'];
}
