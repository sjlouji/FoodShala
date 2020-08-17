@extends('welcome')

@section('title')
    User Registration
@endsection

@section('css')
  <link href="{{asset('css/userlogin.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="login-page align">
  <h2>Register User</h2>
    <div class="form">
      <form class="login-form" action="{{ route('auth.register') }}" method="POST">
        @csrf
        <input type="email" id="email" name="email" placeholder="Email"/>
        <input type="text" id="user_name" name="user_name" placeholder="Name"/>
        <div class="form-group">
          <select style="background-color: #f2f2f2; margin-bottom: 14px; color: #8a8a8a"  class="form-control" id="user_food_pref" name="user_food_pref">
            <option value="veg">Vegetarian</option>
            <option value="nonveg">Non-Vegetarian</option>
          </select>
        </div>
        <input id="password" name="password" type="password" placeholder="Password"/>
        <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password"/>
        <button type="submit">SignUp</button>
        <p class="message">Have an Account? <a href="{{ url('/login') }}">Login</a></p>
      </form>
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
          <p class="alert alert-danger" style="margin-top: 20px"> {{ $error }}</p>
        @endforeach
      @endif
    </div>
  </div>
@endsection