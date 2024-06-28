<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'produit',
        'quantité',
        'couleur',
        'taille',
        'total',
        'Transaction_Ref',
        'produit_id'
    ];
}
