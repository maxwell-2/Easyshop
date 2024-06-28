<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produit extends Model
{
    use HasFactory;
    protected $fillable=[
        'Nom',
        'Prix',
        'image',
        'categorie_id',
        'Stock_disponible',
        'Description'
    ];

    public function getSlug(){
        return Str::slug($this->Nom);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
