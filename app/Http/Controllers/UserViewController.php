<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use App\Restarunt;
use App\Dish;
use App\Order;
use Session;
use DB;


class UserViewController extends Controller
{
    //Redirected page after User login 
    public function indexDashboard(){
        $dish = Restarunt::get();
        return view('Customer.Menu.menu')->with('dish',$dish);
    }

    //View for the Dishes Page
    public function indexMenu(Request $request){
        $rest_id = $request->route('id');
        $dish = Dish::Where('dishes.restaurant_id', $rest_id)->get();
        return view('Customer.Menu.dishes')->with('dish',$dish)->with("rest_id", $rest_id);
    }

    //Function excecuted once the add to cart button is Clicked
    public function makeOrder(Request $request, $id){
        $rest_id = $request->route('rest_id');
        $dish = Dish::find($request->id);   
        Log::info($dish->id);
        Order::create([
            'restarunt_id' => $rest_id,
            'dish_id' => $dish->id,
            'qty' => '1',
            'user_id' => Auth::user()->id,
        ]);
        Session::flash('message', ['dish'=>$dish->dish_name, 'text'=>'ordered successfully' ,'type'=>'success']);
        return redirect()->route('cus.menu',['id' => $rest_id]);
    } 

    //Orders Page
    public function orders(){
        return view('Customer.Orders.orders');
    }

    //Customer Order Data
    public function orderData(){
        Log::info("hell");
        $orders = DB::table('orders')->where('orders.user_id',Auth::user()->id)
        ->join('users','orders.user_id','=', 'users.id')
        ->join('restarunts','orders.restarunt_id','=', 'restarunts.id')
        ->join('dishes','orders.dish_id','=', 'dishes.id')
        ->select('orders.*', 'users.name as user_name', 'users.email as user_email','dishes.dish_name as dish_name', 'restarunts.rest_name as rest_name', 'restarunts.mobile as mobile')
        ->get();
        return Datatables::of($orders)->escapeColumns([])
            ->make(true);
    }
}


