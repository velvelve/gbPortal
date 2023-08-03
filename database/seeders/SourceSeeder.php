<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('sources')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantitySources = 10;
        $news = [];

        for ($i = 0; $i < $quantitySources; $i++) {
            $news[] = [
                'name' => fake()->jobTitle(),
            ];
        }

        return $news;
    }
}
