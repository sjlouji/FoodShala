@extends('Customer.home')

@section('title')
    Menu
@endsection

@section('css')
    
@endsection

@section('content')
  
    <div class="container">
        <div style="height: 100px; width: 100%;  display: flex; justify-content: center; align-items: center;">
            <h2>
                Restaurants
            </h2>
        </div>
        <div class="row">
            @foreach($dish as $dishes)
            <div style="margin-top: 30px" class="col-sm"> 
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ucfirst($dishes->rest_name)}}</h5>
                      <h6 class="card-subtitle mb-2 text-muted" style="padding: 5px"><i class="fa fa-envelope-o" aria-hidden="true"></i>   {{ $dishes->rest_email }}</h6>
                      <h6 class="card-subtitle mb-2 text-muted" style="padding: 5px"><i class="fa fa-mobile" aria-hidden="true"></i>   {{ $dishes->mobile }}</h6>
                      <a href="{{ url('/foodshala/menu/'.$dishes->id ) }}" class="card-link">Order Food from this Restaurant</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection