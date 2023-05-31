<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;


class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'menu',
        'description',
        'image',
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class, 'item_id');
    }
    
}
