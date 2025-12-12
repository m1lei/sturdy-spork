<?php

namespace App\Models;

use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'address',
        'price_from',
        'slug',
        'images'
    ];

    protected $casts = [
        'image' => 'array',
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function portofio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsTo(Tags::class);
    }
}
