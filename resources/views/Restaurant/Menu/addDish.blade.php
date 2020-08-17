@extends('Restaurant.home')

@section('title')
  Add Dish
@endsection

@section('css')

@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Menu</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('res.menu') }}">Menu</a></li>
    <li class="breadcrumb-item">Add Dish</li>
  </ol>
</nav>
<div class="container" style="padding: 80px">
  <h1>Add Dish</h1>
  <form action="{{ route('res.storeDish') }}" method="POST">
    @csrf
    {{-- Dish Name --}}
    <div class="form-group row">
      <label for="dish_name" class="col-sm-2 col-form-label">Dish Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="dish_name" name="dish_name" placeholder="Dish Name">
      </div>
    </div>
    {{-- Dish Price --}}
    <div class="form-group row">
      <label for="dish_price" class="col-sm-2 col-form-label">Price for the Dish</label>
      <div class="col-sm-5 input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">₹</div>
        </div>
        <input type="text" class="form-control" id="dish_price" name="dish_price" placeholder="Price">
      </div>
    </div>
    {{-- Tags for Dish --}}
    <div class="form-group row">
      <label for="dish_tag" class="col-sm-2 col-form-label">Tag</label>
      <div class="col-sm-5 input-group">
        <select class="custom-select mr-sm-2" id="dish_tag" name="dish_tag">
          <option value="dessert">Dessert</option>
          <option value="starters">Starters</option>
          <option value="main_course">Main Course</option>
          <option value="briyani_rice_noodles">Briyani & Rice & Noodles</option>
          <option value="indian_breads">Indian Breads</option>
          <option value="breakfast">Breakfast</option>
          <option value="short_byte">Short Byte</option>
          <option value="rolls">Rolls</option>
          <option value="juice">Juice</option>
        </select>
      </div>
    </div>
    {{-- Veg/Non-Veg Dish --}}
    <div class="form-group row">
      <label for="dish_veg_nonveg" class="col-sm-2 col-form-label">Veg / Non-Veg</label>
      <div class="col-sm-5 input-group">
        <select class="custom-select mr-sm-2" id="dish_veg_nonveg" name="dish_veg_nonveg">
          <option value="veg">Veg</option>
          <option value="nonveg">Non-Veg</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-7">
        <button type="submit" style="float: right;" class="btn btn-primary">Add Dish</button>
      </div>
    </div>
    <div class="col-sm-7">
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p class="alert alert-danger" style="margin-top: 20px"> {{ $error }}</p>
          @endforeach
        @endif
    </div>
  </form>
</div>
@endsection

@section('script')

@endsection