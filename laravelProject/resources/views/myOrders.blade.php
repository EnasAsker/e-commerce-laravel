<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">        
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
    <title>Confirmed Orders</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm fixed-top shadow bg-light d-flex flex-row justify-content-around">
    <a class="navbar-brand" href="index.php"><img src={{asset('images/logo.png')}} width="80px" alt="Logo"></a>
    <ul class="navbar-nav">
      <li class="nav-item text-body">
        <a class="nav-link text-dark" id="navItem" href="index.php">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" id="navItem" href="#">SHOP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark"  id="navItem" href="{{'/contact'}}">CONTACT</a>
      </li>
    </ul>
    <ul class="navbar-nav d-flex flex-row justify-content-between">
        <li class="nav-item">
            <a class="text-body" href="{{'/profile'}}"><i class="fa-regular fa-user text-dark px-2"></i></a>
        </li>
        <li class="nav-item">
            <a class="text-body" href="/cartItems"><i class="fa-solid fa-cart-shopping text-dark px-2"></i></a>
        </li>
        @if (!Session::has('user')) 
        <li>
          <a class="m-2" href="/register" style="color: #E55472; text-decoration: none">Register</a> 
        </li>
        <li>
          <a href="/login" style="color: #E55472; text-decoration: none">Login</a> 
        </li>
        @endif
    </ul>
  </nav>


      <div class="container-fluid d-flex mt-5 justify-content-around">
        @foreach ($orders as $order) 
        <div class="card border border-0" style="width:200px"> 
         <img class="card-img-top" src="{{asset('images/'.$order->product_image)}}" alt="Card image"> 
         <div class="card-body">  
           <p class="card-text text-uppercase small">{{$order->product_name}}</p> 
         </div> <div class="card-footer"> 
           <p>${{$order->product_price}}.00</p> 
         </div> 
       </div> 
       @endforeach 
     </div>


</body>
</html>