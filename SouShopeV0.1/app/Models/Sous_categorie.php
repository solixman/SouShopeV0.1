<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_categorie extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',

    ];

    public function Categorie(){
        return $this-> hasone(Categorie::class);
    }

    public function Products(){
        return $this->belongsToMany(Product::class);
    }

}
