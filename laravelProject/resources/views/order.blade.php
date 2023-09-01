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
    <title>Orders</title>
    <style>
      .btn{
          background-color: #E55472 !important;
          color: white !important;
          border-radius: 20px !important;
          margin: 10px;
            }

      .btn:hover{background-color: darkgray;
            color: white;
            transition: 0.2s}
    </style>
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
      
    <table class="table table-hover mt-5">
        <tbody>
          <tr>
            <td>Price</td>
            <td>{{$total}}$</td>
          </tr>
          <tr>
            <td>Shipping</td>
            <td>20$</td>
          </tr>
          <tr>
            <td>Total Price</td>
            <td>{{$total+20}}$</td>
          </tr>
        </tbody>
      </table>
      <form action="/orderPlace" method="POST">
        @csrf
        <button class="btn">Confirm Order</button>
      </form>
</body>
</html>