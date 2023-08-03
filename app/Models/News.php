<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';


    public function getAll()
    {
        return DB::table($this->table)->get();
    }

    public function getItemById(int $id)
    {
        return DB::table($this->table)->find($id);
    }
}
