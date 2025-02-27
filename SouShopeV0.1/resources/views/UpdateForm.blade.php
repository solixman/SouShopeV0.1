<?php

use App\Http\Controllers\SousCategorieController;
use App\Models\Sous_categorie;

$Scategories = new SousCategorieController;

$sousCategories = $Scategories->GetAll();
$PsousCategorie = Sous_categorie::find($Product->sous_categorie_id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="col-md-10">
      <form action="/Product/update" method="get" class="w-full">


        <div class="form-element mb-4">
          <label for="title" class="block text-gray-700 mb-2">titre</label>
          <input type="text" name="titre" required placeholder="{{ $Product->titre }}" value="{{ $Product->titre }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />


        </div>

        <div class="form-element mb-4">
          <label for="description" class="block text-gray-700 mb-2">image</label>
          <input type="text" name="image" required placeholder="{{ $Product->image }}" value="{{ $Product->image }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="form-element mb-4">

          <input type="hidden" name="status" value="available" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>



        <div class="form-element mb-4">
          <label for="price" class="block text-gray-700 mb-2">price</label>
          <input type="text" name="price" required placeholder="{{ $Product->price }}" value="{{ $Product->price }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="form-element mb-4">
          <label for="type" class="block text-gray-700 mb-2">type</label>
          <input type="text" name="type" required placeholder="{{ $Product->type }}" value="{{$Product->type}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="form-element mb-4">
          <label for="type" class="block text-gray-700 mb-2">capacity</label>
          <input type="text" name="quantity" required placeholder="{{ $Product->quantity }}" value="{{ $Product->quantity }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>


        <select class="form-select" name='sous_categorie_id' aria-label="Default select example">
          <option name='sous_categorie_id' value="{{$PsousCategorie->id}}" selected>{{ $PsousCategorie->name }}</option>
          @foreach($sousCategories as $SCategorie)
          <option name='sous_categorie_id'  value="{{$SCategorie->id}}">{{$SCategorie ->name}}</option>
          @endforeach
        </select>


        <div class="form-element mb-4">
          <label for="images" class="block text-gray-700 mb-2">description</label>
          <input type="text" name="description" required placeholder="{{ $Product->description }}" value="{{ $Product->description }}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>

        </div>
        <div class="flex justify-end space-x-2">
          <input type="hidden" id="salle_id" class="fadeIn second" name="id" placeholder="id" value="{{ $Product->id }}">
          <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Annuler</button>
          <input type="submit" name="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600" value="Publier">
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>