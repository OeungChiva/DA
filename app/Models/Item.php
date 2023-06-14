<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\OrderItem;
use App\Models\Menu;




class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'menu_id',
        'description',
        'image',
        'num_review',
        'discount',
    ];
    
    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'item_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'item_id');
    }

    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class, 'order_items')
    //                 ->withPivot('quantity', 'item_title', 'price', 'image');
    // }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
