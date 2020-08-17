@extends('Restaurant.home')

@section('title')
  Profile
@endsection

@section('css')
  <link href="{{asset('css/profile.css')}}" rel="stylesheet">
@endsection 

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Profile</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('res.profileView') }}">Profile</a></li>
  </ol>
</nav>
<div class="container">
  <div class="text-center">
    <h2>Restaurant Info</h2>
  <div style="margin: 30px">
    <table class='table' style="border: 0 !important">
      <tbody>
        <tr style="text-align: start">
          <td>Restaurant Name</td>
          <td>{{ ucfirst(Auth::guard('webrest')->user()->rest_name) }}</td>
        </tr>
        <tr style="text-align: start">
          <td>Contact Email</td>
          <td>{{ Auth::guard('webrest')->user()->rest_email }}</td>
        </tr>
        <tr style="text-align: start">
          <td>Contact Number</td>
          <td>{{ Auth::guard('webrest')->user()->mobile }}</td>
        </tr>
        <tr style="text-align: start">
          <td>Restaurant Registered On</td>
          <td>{{ Auth::guard('webrest')->user()->created_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
