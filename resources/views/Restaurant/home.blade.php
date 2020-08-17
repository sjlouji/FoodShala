<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ ucfirst(Auth::guard('webrest')->user()->rest_name) }} | @yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
        <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('css')
    </head>
    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><span style="font-weight: 800;">Food</span><span style="background-color: #d04545; color: white; font-weight: 800"><b>Shala</b></span> - {{ Auth::guard('webrest')->user()->rest_name }} Restaurant</a>
            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ url('/restaurant/logout') }}">Sign out</a>
              </li>
            </ul>
          </nav>
      
          <div class="container-fluid">
            <div class="row">
              <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Actions</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                          <span data-feather="plus-circle"></span>
                        </a>
                      </h6>
                  <ul class="nav flex-column">
                    <li class="nav-item {{ Route::currentRouteNamed('res.profileView') ? 'active' : '' }}">
                        <a class="nav-link {{ Route::currentRouteNamed('res.profileView') ? 'active' : '' }}" href="{{ route('res.profileView') }}">
                            <span data-feather="file"></span>
                            <i class="fa fa-bars"></i>
                             Restaurant Profile
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('res.menu') ? 'active' : '' }}">
                        <a class="nav-link {{ Route::currentRouteNamed('res.menu') ? 'active' : '' }}" href="{{ route('res.menu') }}">
                        <span data-feather="shopping-cart"></span>
                        <i class="fa fa-tasks"></i>
                        Restaurant Menu
                      </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('res.logs') ? 'active' : '' }}">
                        <a class="nav-link {{ Route::currentRouteNamed('res.logs') ? 'active' : '' }}" href="{{ route('res.logs') }}">
                        <span data-feather="users"></span>
                        <i class="fa fa-users"></i>
                        Customer's order history
                      </a>
                    </li>
                  </ul>
                </div>
              </nav>
      
              <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('content')
              </main>
            </div>
          </div>
      
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>