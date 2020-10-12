{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        
                        <thead>
                            <tr>
                            <th>Order No</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                           
                            @foreach($orders as $key => $order)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$order->shipping_id}}<td>
                                <td>{{ $order->total }}</td>
                                <td>
                                    @if($order->status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                    @else
                                    <span class="badge badge-success">Done</span>
                                    @endif
                                </td>
                                    <a href="" class="btn btn-danger" href=""><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                          
                            
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

                      <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        
                        <thead>
                            <tr>
                            <th>Order SL</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>
                           
                            @foreach($orders as $key => $order)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$order->shipping->name}}({{$order->shipping->phone}})</td>
                                <td>
                                    @if($order->status == 0)
                                        <span class="badge badge-danger">Pending</span>
                                    @else
                                    <span class="badge badge-success">Done</span>
                                    @endif
                                </td>
                                <td>{{ $order->total }} tk</td>
                                <td>
                                    <a href="{{ route('order.details',$order->id) }}" class="btn btn-success" title="Details" href=""><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                          
                            
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
                
                
            

            </div>

            <br><br>

            
        </div>
      
      
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
