<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
   {
      return \view('categories.index', [
         'categories' => $this->getCategory(),
      ]);
   }

   public function show(int $id){
    return \view('categories.show', [
       'category' => $this->getCategory($id),
    ]);
 }

}
