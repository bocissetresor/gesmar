<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnacement_mensul extends Model
{
    use HasFactory;
    protected $fillable = ['code','date_ordonnacement', 'somme_ordonnacement', 'commentaire'];

}
