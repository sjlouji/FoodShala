<?php

namespace App;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            Log::info('old Cart');
            Log::info($oldCart);
        }
    }

    public function add($item, $id){
        $storedItem = ['qty'=>0, 'item'=>$item];
        Log::info("Adding to cart");
        if($this->item){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        return $storedItem;
    }

}
