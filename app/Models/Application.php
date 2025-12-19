<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Application extends Model
{
    use HasFactory ,AsSource, Attachable, Filterable;//быстрая фильтрация за счет орчида

    protected $fillable = [
      'name',
      'phone',
      'email'
    ];

    protected $allowedSorts = [
        'id',
        'created_at'
    ];
}
