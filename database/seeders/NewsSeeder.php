<?php

namespace Database\Seeders;

use App\Enums\News\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantityCategories = 6;
        $quantityNews = 10;
        $news = [];

        for ($j = 1; $j < $quantityCategories; $j++) {
            for ($i = 0; $i < $quantityNews; $i++) {
                $news[] = [
                    'category_id' => $j,
                    'title' => fake()->jobTitle(),
                    'author' => fake()->userName(),
                    'image' => fake()->imageUrl(200, 150),
                    'status' => Status::ACTIVE->value,
                    'description' => fake()->text(100),
                    'created_at' => now(),
                    'source_id' => $i + 1,
                ];
            }
        }

        return $news;
    }
}
