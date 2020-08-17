@extends('Customer.home')

@section('title')
    Dishes
@endsection

@section('css')
    
@endsection

@section('content')

    <div class="container">
        <div style="height: 100px; width: 100%;  display: flex; justify-content: center; align-items: center;">
            <h2>
                Dishes
            </h2>
        </div>
        <div class="container">
            <div class="row" style="justify-content: center">
                <div class="col-sm-6">
                    {{-- <h1>{{$rest_id}}</h1> --}}
                    @if(Session::has('message'))
                        <div class="alert alert-{{session('message')['type']}}">
                            {{session('message')['text']}}   {{session('message')['text']}}
                        </div>
                    @endif
                @foreach($dish as $dishes)
                      <div class="card" style="margin-top: 30px">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">{{$dishes->dish_name}}</h5>
                                    <p class="card-text">{{$dishes->dish_price}} ₹</p>
                                      @if ($dishes->dish_tag == 'dessert')
                                          <h6>Dessert</h6>
                                      @elseif($dishes->dish_tag == 'starters')
                                          <h6>Startes</h6>
                                      @elseif($dishes->dish_tag == 'main_course')
                                          <h6>Main Course</h6>
                                      @elseif($dishes->dish_tag == 'briyani_rice_noodles')
                                          <h6>Briyani, Rice and Noodles</h6>
                                      @elseif($dishes->dish_tag == 'indian_breads')
                                          <h6>Indian Breads</h6>
                                      @elseif($dishes->dish_tag == 'breakfast')
                                          <h6>BreakFast</h6>
                                      @elseif($dishes->dish_tag == 'short_byte')
                                          <h6>Short Byte</h6>
                                      @elseif($dishes->dish_tag =='rolls')
                                          <h6>Rolls</h6>
                                      @elseif($dishes->dish_tag == 'juice')
                                          <h6>Juice</h6>
                                      @else
                                          <h6>No tag</h6> 
                                      @endif
          
                                      @if ($dishes->dish_veg_nonveg == 'veg')
                                          <p><span class="badge badge-pill badge-secondary" style="height: 20px">Vegetarian Food</span></p>
                                      @elseif($dishes->dish_veg_nonveg == 'nonveg')
                                          <p><span class="badge badge-pill badge-info" style="height: 20px">Non-Vegetarian Food</span></p>
                                      @else
                                          <p><span class="badge badge-pill badge-danger" style="height: 20px">No Pref</span></p>
                                      @endif
                                </div>
                                <div class="col">
                                    <a href="{{ route('cus.cart', ['rest_id' => $rest_id,'id' => $dishes->id]) }}" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        </div>
                      </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection