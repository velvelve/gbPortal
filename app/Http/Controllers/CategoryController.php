<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index()
   {
      $categories = app(Category::class);
      return \view('categories.index', [
         'categories' => $categories->getAll(),
      ]);
   }

   public function show(int $id)
   {
      $categories = app(Category::class);
      $category = $categories->getItemById($id);
      return \view('categories.show', [
         'category' => $category,
      ]);
   }
}
