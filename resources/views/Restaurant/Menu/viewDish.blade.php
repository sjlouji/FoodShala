@extends('Restaurant.home')

@section('title')
  View Dish
@endsection

@section('css')

@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Menu</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <button class="btn btn-sm btn-outline-danger" onclick="window.location='{{ route('res.deleteDish',['id'=>$dish->id]) }}'"><i class="fa fa-trash"></i> Delete this dish</button>
    </div>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('res.menu') }}">Menu</a></li>
    <li class="breadcrumb-item">View Dish</li>
  </ol>
</nav>
<div class="container" style="padding: 80px">
  <h1>View Dish</h1>
  <table class="table table-borderless">
    <tbody>
      <tr>
        <td>Id</td>
        <td>{{ $dish->id }}</td>
      </tr>
      <tr>
        <td>Dish Name</td>
        <td>{{ $dish->dish_name }}</td>
      </tr>
      <tr>
        <td>Dish Price</td>
        <td>{{ $dish->dish_price }} ₹</td>
      </tr>
      <tr>
        <td>Dish Tag</td>
        <td>{{ $dish->dish_tag }}</td>
      </tr>
      <tr>
        <td>Veg / Non-Veg</td>
        <td>{{ $dish->dish_veg_nonveg }}</td>
      </tr>
      <tr>
        <td>Restaurant Id</td>
        <td>{{ $dish->restaurant_id }}</td>
      </tr>
      <tr>
        <td>Created At</td>
        <td>{{ $dish->created_at }}</td>
      </tr>
      <tr>
        <td>Update At</td>
        <td>{{ $dish->updated_at }}</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection

@section('script')

@endsection        
