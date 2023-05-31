<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'item_title',
        'quantity',
        'price',
        'image',
        'item_id',
        'payment_status',
        'delivery_status',
    ];
    //just changed
    public function review()
    {
        return $this->hasOne(Review::class, 'item_id', 'item_id');
    }
    protected $foreignKey = 'item_id';

}
