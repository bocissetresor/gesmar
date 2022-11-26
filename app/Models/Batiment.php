<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batiment extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'designation', 'site_id'];
    
    public function site(){
        return $this->belongsTo(Site::class);
    }

}

