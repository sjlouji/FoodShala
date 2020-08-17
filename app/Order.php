<?php

namespace App;

use App\Dish;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'restarunt_id',
        'dish_id',
        'qty',
        'user_id',
      ];

      public function dishes()
      {
        return $this->hasMany(Dish::class, 'dish_id');
      }
}
