@extends('welcome')

@section('title')
  Restraunt Registration
@endsection

@section('css')
  <link href="{{asset('css/styles.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="grid">
    <h2 style="text-align: center; margin-bottom: 35px">Restraunt Login</h2>
      
  <form action="{{ route('resAuth.register') }}" method="POST" class="form login">
    @csrf
    <div class="form__field">
      <input id="rest_email" type="email" name="rest_email" class="form__input" placeholder="Email" >
      <label for="rest_email" style="margin-bottom: 0 !important"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Username</span></label>
    </div>
    <div class="form__field">
        <input id="rest_name" type="text" name="rest_name" class="form__input" placeholder="Restarunt Name" >
        <label for="rest_name" style="margin-bottom: 0 !important"><img class="icon" src="https://img.icons8.com/material-rounded/18/000000/online-shop-2.png"/><span class="hidden">Restarunt Name</span></label>
    </div>
    <div class="form__field">
        <input id="mobile" type="text" name="mobile" class="form__input" placeholder="Contact Number" >
        <label for="mobile" style="margin-bottom: 0 !important"><img class="icon" src="https://img.icons8.com/ios/50/000000/ringing-phone.png"/><span class="hidden">Contact Number</span></label>
    </div>
    <div class="form__field">
      <input id="password" type="password" name="password" class="form__input" placeholder="Password" >
      <label for="password" style="margin-bottom: 0 !important"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
    </div>
    <div class="form__field">
      <input id="confirm_password" type="password" name="confirm_password" class="form__input" placeholder="Confirm Password" >
      <label for="confirm_password" style="margin-bottom: 0 !important"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
    </div>
    <div class="form__field">
      <input type="submit" value="Sign Up">
    </div>
    <div>
    </div>
  </form>
  <p class="text--start text-justify">Note : We are open only for Indian Restaurants and please provide a valid email and mobile number.  Avoid adding 0 and +91 before your mobile number.</p>
  <p class="text--center">Have an Account? <a href="{{ url('/restaurant/login') }}">Login now</a> <svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icons.svg#arrow-right"></use></svg></p>
  @if (count($errors) > 0)
  @foreach ($errors->all() as $error)
      <p class="alert alert-danger" style="margin-top: 20px"> {{ $error }}</p>
    @endforeach
  @endif
</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>

@endsection