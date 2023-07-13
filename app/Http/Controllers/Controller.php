<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getCategory(int $id = null): array{

        if($id != null)
        {
            return [
                'id' => $id,
                'name' => fake() -> jobTitle(),
                'description' => fake()->text(50),
                'created_at' => now()->format('d-m-Y H:i')
            ];
        }

        $categoriesCount = 5;
        $categories = [];

        for($i=0; $i < $categoriesCount; $i++)
        {
            $categories[] = [
                'id' => ($i===0) ? ++$i : $i,
                'name' => fake() -> jobTitle(),
                'description' => fake()->text(50),
                'created_at' => now()->format('d-m-Y H:i')
            ];
        }
        return $categories;
    }

    public function getNews(int $id = null): array
    {
        if($id != null)
        {
            return [
                'id' => $id,
                'title' => fake() -> jobTitle(),
                'author' => fake() -> userName(),
                'image' => fake() -> imageUrl(),
                'status' => 'ACTIVE',
                'description' => fake()->text(100),
                'created_at' => now()->format('d-m-Y H:i')
            ];
        }

        $quantityNews = 10;
        $news = [];

        for($i=0; $i < $quantityNews; $i++)
        {
            $news[] = [
                'id' => ($i===0) ? ++$i : $i,
                'title' => fake() -> jobTitle(),
                'author' => fake() -> userName(),
                'image' => fake() -> imageUrl(200, 150),
                'status' => 'ACTIVE',
                'description' => fake()->text(100),
                'created_at' => now()->format('d-m-Y H:i')
            ];
        }

        return $news;
    }
}
