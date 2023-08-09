<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   public function index(Request $request)
   {
      if ($request->has('category_id')) {
         $category_id = $request->query('category_id', 1);
         $news = News::query()->where('category_id', $category_id)->get();
      } else {
         $news = News::all();
      }
      return \view('news.index', [
         'newsList' => $news,
      ]);
   }

   public function show(int $id)
   {
      $newsItem = News::find($id);
      return \view('news.show', [
         'news' => $newsItem,
      ]);
   }
}
