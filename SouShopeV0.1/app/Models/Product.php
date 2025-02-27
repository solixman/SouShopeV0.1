<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable= [
        'titre',
        'image',
        'type',
        'price',
        'quantityInStock',
        'description'
    ];

public function Admin(){
    return $this->belongsto(User::class);
}

public function sous_Categorie(){
    return $this->hasone(Sous_Categorie::class);
}


}
