<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_menu',
        'description',
    ];
    public static function rules()
    {
        return [
            'name_menu' => 'required|unique:menus,name_menu',
            'description' => 'required',
        ];
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
