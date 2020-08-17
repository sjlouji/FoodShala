<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  protected $fillable = [
    'id',
    'dish_name',
    'dish_price',
    'dish_tag',
    'dish_veg_nonveg',
    'restaurant_id',
  ];

  protected $hidden = [
    'remember_token',
  ];

}
