<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Shop</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light" style="background: chartreuse;">
              <a class="navbar-brand" href="{{ url('/') }}">Home</a>
              <a class="navbar-brand" href="{{ route('cart.page') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart({{ Cart::count() }})</a>
              @if(Auth::check())
              <a class="navbar-brand" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                </form>
              @else
              <a class="navbar-brand" href="{{ route('login') }}">Login</a>
              <a class="navbar-brand" href="{{ route('register') }}">Register</a>
              @endif
            </nav>

            <br>

            <div class="row">
             @foreach($items as $key=>$item)
              <div class="col-md-4">
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                <input type="hidden" value="{{ $key+1 }}" name="id">
                <input type="hidden" value="{{$item['name']}}" name="name">
                <input type="hidden" value="{{$item['price']}}" name="price">
                <input type="hidden" value="{{$item['image']}}" name="image">
                <input type="hidden" value="1" name="qty">
                <div class="card text-center" style="width: 18rem;">
                  <img class="card-img-top" src="{{ $item['image'] }}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><a target="_blank" href="{{ $item['url'] }}">{{$item['name']}}</a></h5>
                    <p class="card-text">{{$item['model']}}</p>
                    <p class="card-text">Price : <span style="font-weight: bold">{{$item['price']}} tk</span></p>
                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                  </div>
                </div>
                </form>

            </div>
            @endforeach
            

        </div>
            
        </div>
      
      
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
@if(session()->has('success'))
<script type="text/javascript">
  $(function(){
    $.notify("{{ session()->get('success') }}",{globalPosition: 'top right', className: 'success'})
  })


</script>
@endif

@if(session()->has('error'))
<script type="text/javascript">
  $(function(){
    $.notify("{{ session()->get('error') }}",{globalPosition: 'top right', className: 'error'})
  })


</script>
@endif
    </body>
</html>
