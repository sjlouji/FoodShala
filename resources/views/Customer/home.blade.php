<html>
    <head>
        <title>Foodshala | @yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('css')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}"><span style="font-weight: 800;">Food</span><span style="background-color: #d04545; color: white; font-weight: 800"><b>Shala</b></span> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav px-3 ml-auto">
                <li class="nav-item text-nowrap" data-toggle="tooltip" data-placement="bottom" title={{ Auth::user()->email }}>
                  <a class="nav-link" href="{{ url('/orders') }}">Orders</a>
              </li>
                <li class="nav-item text-nowrap" data-toggle="tooltip" data-placement="bottom" title={{ Auth::user()->email }}>
                    <a class="nav-link" href="{{ url('logout') }}">Sign out ( Logged in as {{Auth::user()->name}}  )</a>
                </li>
              </ul>
            </div>
          </nav>
          @yield('content')
          
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>          
        @yield('script')
    </body>
</html>

