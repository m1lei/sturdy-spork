<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Portfolio extends Model
{
    use HasFactory ,AsSource, Attachable;

    protected $fillable = [
      'title',
      'slug',
      'images'
    ];
    protected $casts = [
        'images' => 'array'
    ];


    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
