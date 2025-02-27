<?php

namespace App\Http\Controllers;

use App\Models\Sous_categorie;
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    public function GetAll(){

      return  $sousCategories = Sous_categorie::get();

    }
}
