<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clothes extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image'];

    // If you want to upload images using the storage system
    protected $casts = [
        'image' => 'string',
    ];
}
