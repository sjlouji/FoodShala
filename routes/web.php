<?php
use Illuminate\Support\Facades\Route;

//User Auth Routes Starts here
Route::get('/login', [ 'as' => 'auth.loginView', 'uses' => 'UserAuthController@indexLogin']);
Route::get('/register', [ 'as' => 'auth.registerView', 'uses' => 'UserAuthController@indexRegister']);
Route::post('/accounts/register', [ 'as' => 'auth.register', 'uses' => 'UserAuthController@userRegistration']);
Route::post('/accounts/login', [ 'as' => 'auth.login', 'uses' => 'UserAuthController@userLogin']);
Route::get('/logout', [ 'as' => 'auth.logout', 'uses' => 'UserAuthController@userLogout']);
//User Auth Routes Ends here

//User or Customer View Starts here
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [ 'as' => 'cus.userDashboard', 'uses' => 'UserViewController@indexDashboard']);
    Route::get('/foodshala/menu/{id}', [ 'as' => 'cus.menu', 'uses' => 'UserViewController@indexMenu']);
    Route::get('/orders', [ 'as' => 'cus.ordres', 'uses' => 'UserViewController@orders']);
    Route::get('/foodshala/data', [ 'as' => 'cus.orderData', 'uses' => 'UserViewController@orderData']);
    //Food Cart
        Route::get('/foodshala/memu/{rest_id}/makeOrder/{id}', [ 'as' => 'cus.cart', 'uses' => 'UserViewController@makeOrder' ]);
});
//User or Customer View Ends here

//Restraunt Auth Routes Starts here
Route::get('/restaurant/login', [ 'as' => 'resAuth.loginView', 'uses' => 'RestrauntAuthController@indexLogin']);
Route::get('/restaurant/register', [ 'as' => 'resAuth.registerView', 'uses' => 'RestrauntAuthController@indexRegister']);
Route::post('/restaurant/accounts/register', [ 'as' => 'resAuth.register', 'uses' => 'RestrauntAuthController@restaruntRegistration']);
Route::post('/restaurant/accounts/login', [ 'as' => 'resAuth.login', 'uses' => 'RestrauntAuthController@restaruntLogin']);
Route::get('/restaurant/logout', [ 'as' => 'resAuth.logout', 'uses' => 'RestrauntAuthController@restaruntLogout']);
//Restraunt Auth Routes Ends here

//Restaurant View Starts here
Route::group(['middleware' => ['auth_rest:webrest']], function() {
    Route::get('/restaurant', [ 'as' => 'res.dashBoardView', 'uses' => 'RestaurantViewController@indexDashboard']);
    //Restaurant Profile Starts
        Route::get('/restaurant/profile', [ 'as' => 'res.profileView', 'uses' => 'RestaurantViewController@indexProfile']);
    //Restaurant Profile Ends
    //Menu Starts
        Route::get('/restaurant/menu', [ 'as' => 'res.menu', 'uses' => 'RestaurantViewController@indexMenu']);
        Route::get('/restaurant/menu/data', [ 'as' => 'res.menuapi', 'uses' => 'RestaurantViewController@dishData']);
        Route::get('/restaurant/menu/addDish', [ 'as' => 'res.addDish', 'uses' => 'RestaurantViewController@addDish']);
        Route::post('/restaurant/menu/addDish', [ 'as' => 'res.storeDish', 'uses' => 'RestaurantViewController@storeDish']);
        Route::get('/restaurant/menu/{id}/view', [ 'as' => 'res.viewDish', 'uses' => 'RestaurantViewController@viewDish']);
        Route::get('/restaurant/menu/{id}/edit', [ 'as' => 'res.editDish', 'uses' => 'RestaurantViewController@editDish']);
        Route::post('/restaurant/menu/update', [ 'as' => 'res.updateDish', 'uses' => 'RestaurantViewController@updateDish']);
        Route::get('/restaurant/menu/{id}/delete', [ 'as' => 'res.deleteDish', 'uses' => 'RestaurantViewController@deleteDish']);
    //Menu Ends
    //Orders Starts
        Route::get('/restaurant/customer/logs', [ 'as' => 'res.logs', 'uses' => 'RestaurantViewController@indexLogs']);
        Route::get('/restaurant/customer/logs/data', [ 'as' => 'res.orderData', 'uses' => 'RestaurantViewController@orderData']);
    //Orders Ends

});
//Restaurant View Ends here