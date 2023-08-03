<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   public function index()
   {
      $news = app(News::class);
      return \view('news.index', [
         'newsList' => $news->getAll(),
      ]);
   }

   public function show(int $id)
   {
      $news = app(News::class);
      $newsItem = $news->getItemById($id);
      $sources = app(Source::class);
      $source = $sources->getItemById($newsItem->source_id);
      return \view('news.show', [
         'news' => $newsItem,
         'source' => $source,
      ]);
   }
}
