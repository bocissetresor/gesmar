<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'designation', 'etage_id'];
    public function etage(){
        return $this->belongsTo(Etage::class);
    }
}
