<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        $categoriesCount = 5;
        $categories = [];

        for ($i = 0; $i < $categoriesCount; $i++) {
            $categories[] = [
                'title' => fake()->jobTitle(),
                'description' => fake()->text(50),
                'created_at' => now(),
            ];
        }
        return $categories;
    }
}
