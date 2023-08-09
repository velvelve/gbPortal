<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
   public function index()
   {
      $categories = Category::all();
      return \view('categories.index', [
         'categories' => $categories,
      ]);
   }

   public function show(int $id)
   {
      $category = Category::find($id);
      return \view('categories.show', [
         'category' => $category,
      ]);
   }
}
