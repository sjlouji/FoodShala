@extends('Restaurant.home')

@section('title')
  Edit Dish
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
    <li class="breadcrumb-item">Edit Dish</li>
  </ol>
</nav>
<div class="container" style="padding: 80px">
  <h1>Edit Dish</h1>
  <form action="{{ route('res.updateDish') }}" method="POST">
    @csrf
    {{-- Dish Name --}}
    <div class="form-group row">
      <label for="dish_name" class="col-sm-2 col-form-label">Dish Name</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="dish_id" name="dish_id" hidden value="{{ $dish->id }}" placeholder="Dish Name">
        <input type="text" class="form-control" id="dish_name" name="dish_name" value="{{ $dish->dish_name }}" placeholder="Dish Name">
      </div>
    </div>
    {{-- Dish Price --}}
    <div class="form-group row">
      <label for="dish_price" class="col-sm-2 col-form-label">Price for the Dish</label>
      <div class="col-sm-5 input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">₹</div>
        </div>
        <input type="text" class="form-control" id="dish_price" name="dish_price" value="{{ $dish->dish_price }}" placeholder="Price">
      </div>
    </div>
    {{-- Tags for Dish --}}
    <div class="form-group row">
      <label for="dish_tag" class="col-sm-2 col-form-label">Tag</label>
      <div class="col-sm-5 input-group">
        <select class="custom-select mr-sm-2" id="dish_tag" name="dish_tag">
          <option value="dessert" @if($dish->dish_tag=='dessert') selected @endif>Dessert</option>
          <option value="starters" @if($dish->dish_tag=='starters') selected @endif>Starters</option>
          <option value="main_course" @if($dish->dish_tag=='main_course') selected @endif>Main Course</option>
          <option value="briyani_rice_noodles" @if($dish->dish_tag=='briyani_rice_noodles') selected @endif>Briyani & Rice & Noodles</option>
          <option value="indian_breads" @if($dish->dish_tag=='indian_breads') selected @endif>Indian Breads</option>
          <option value="breakfast" @if($dish->dish_tag=='breakfast') selected @endif>Breakfast</option>
          <option value="short_byte" @if($dish->dish_tag=='short_byte') selected @endif>Short Byte</option>
          <option value="rolls" @if($dish->dish_tag=='rolls') selected @endif>Rolls</option>
          <option value="juice" @if($dish->dish_tag=='juice') selected @endif>Juice</option>
        </select>
      </div>
    </div>
    {{-- Veg/Non-Veg Dish --}}
    <div class="form-group row">
      <label for="dish_veg_nonveg" class="col-sm-2 col-form-label">Veg / Non-Veg</label>
      <div class="col-sm-5 input-group">
        <select class="custom-select mr-sm-2" id="dish_veg_nonveg" name="dish_veg_nonveg">
          <option value="veg" @if($dish->dish_veg_nonveg=='veg') selected @endif>Veg</option>
          <option value="nonveg" @if($dish->dish_veg_nonveg=='nonveg') selected @endif>Non-Veg</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-7">
        <button type="submit" style="float: right;" class="btn btn-primary">Update Dish Info</button>
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