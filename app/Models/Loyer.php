<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loyer extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'date_payement', 'loyer_somme_payer', 'somme_restant', 'mois_payer', 'contrat_id'];
}
