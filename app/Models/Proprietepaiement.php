<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietepaiement extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'date_payement', 'index_dbt', 'index_fn', 'somme_payer', 'somme_restant', 'mois_payer', 'contrat_id'];

    public function ordonnacement_proprietes(){
        return $this->hasMany(Propriete::class);
    }
}
