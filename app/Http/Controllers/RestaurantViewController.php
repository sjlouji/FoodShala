<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use App\Dish;
use App\Order;
use DB;

class RestaurantViewController extends Controller
{
    //Dashboard View
    public function indexDashboard(){
        return view('Restaurant.Dashboard.dashboard');
    }

    //Profile View
    public function indexProfile(){
        return view('Restaurant.Profile.profile');
    }



    //Customer Logs View
    public function indexLogs(){
        return view('Restaurant.CustomerLogs.logs');
    }
    //Customer Order Data
    public function orderData(Request $request){
        // $orders = Order::Where('orders.restarunt_id', Auth::guard('webrest')->user()->id)->get();
        $orders = DB::table('orders')->where('orders.restarunt_id',Auth::guard('webrest')->user()->id)
                                     ->join('users','orders.user_id','=', 'users.id')
                                     ->join('dishes','orders.dish_id','=', 'dishes.id')
                                     ->select('orders.*', 'users.name as user_name', 'users.email as user_email','dishes.dish_name as dish_name')
                                     ->get();
        return Datatables::of($orders)->escapeColumns([])
                                    ->make(true);
    }


    //Menu View
    public function indexMenu(){
        return view('Restaurant.Menu.menu');
    }
    //Menu - Add Dish View
    public function addDish(){
        return view('Restaurant.Menu.addDish');
    }
    //Menu - Store Dish 
    public function storeDish(Request $request){
        $this->validate($request, [
            'dish_name' => 'required||max:250',
            'dish_price' => 'required|numeric',
            'dish_tag' => 'required',
            'dish_veg_nonveg' => 'required',
        ]);
        Dish::create([
            'dish_name' => $request->input('dish_name'),
            'dish_price' => $request->input('dish_price'),
            'remember_token' => $request->input('_token'),
            'dish_tag' => $request->input('dish_tag'),
            'restaurant_id' => Auth::guard('webrest')->user()->id,
            'dish_veg_nonveg' => $request->input('dish_veg_nonveg'),
        ]);
        return redirect('/restaurant/menu')->with('Status','Successfully Registred');
    }
    //Menu Api to get the Dish details
    public function dishData(Request $request){
        $dish = Dish::Where('dishes.restaurant_id', Auth::guard('webrest')->user()->id)->select('id','dish_name','dish_price','dish_tag','dish_veg_nonveg')->get();
        return Datatables::of($dish)->escapeColumns([])
                                    ->make(true);
    }
    //View Dish
    public function viewDish(Request $request){
        $dishId = $request->route('id');
        $dish = Dish::find($dishId);
        if(!$dish){
            return "Page Not Found" ;
        }
        Log::info($dish);
        return view('Restaurant.Menu.viewDish')->with('dish',$dish);
    }
    public function restaurants() {
        return $this->hasMany('App\Restarunt');
    } 
    //Edit Dish
    public function editDish(Request $request){
        $dishId = $request->route('id');
        $dish = Dish::find($dishId);
        if(!$dish){
            return "Page Not Found" ;
        }
        return view('Restaurant.Menu.editDish')->with('dish',$dish);
    }
    //UpdateDish
    public function updateDish(Request $request){
        $this->validate($request, [
            'dish_id' => 'required|max:250',
            'dish_name' => 'required|max:250',
            'dish_price' => 'required|numeric',
            'dish_tag' => 'required',
            'dish_veg_nonveg' => 'required',
        ]);
        Log::info($request->dish_name);
        $dish = Dish::find($request->dish_id);
        Log::info($dish);
        $dish->dish_name=$request->dish_name;
        $dish->dish_price=$request->dish_price;
        $dish->dish_tag=$request->dish_tag;
        $dish->dish_veg_nonveg=$request->dish_veg_nonveg;
        $dish->update();
        return redirect('/restaurant/menu')->with('Status','Dish Updation Successfull');
    }
    //Delete Dish
    public function deleteDish(Request $request){
        $dish = Dish::find($request->id);
        $dish->delete();
        return redirect('/restaurant/menu')->with('Status','Dish Deleted Successfully');
    }

}
