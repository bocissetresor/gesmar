<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    use HasFactory;
    protected $fillable = ['somme_total_paiement_effectuer', 'somme_ouverture', 'somme_fermerture', 'date_heure_fermerture', 'date_heure_ouverture', 'date_payement', 'somme_payer', 'motif', 'commenter', 'mode_paiement', 'banque', 'statut'];
}
