@extends('welcome')

@section('title')
    User Login
@endsection

@section('css')
  <link href="{{asset('css/userlogin.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="login-page align">
  <h2>FoodShala</span> User Login</h2>
    <div class="form">
      <form class="login-form" action="{{ route('auth.login') }}" method="POST">
        @csrf
        <input type="email" id="email" name="email" placeholder="Email"/>
        <input type="password" id="password" name="password" placeholder="password"/>
        <button>Login</button>
        <p class="message">Not registered? <a href="{{ url('/register') }}">Create an account</a></p>
      </form>
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
          <p class="alert alert-danger" style="margin-top: 20px"> {{ $error }}</p>
        @endforeach
      @endif
    </div>
  </div>
@endsection