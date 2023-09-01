<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">        
        <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
        {{-- <link rel="stylesheet" href={{asset('css/style.css')}}> --}}
        <style>
          body{font-family: 'Montserrat'}
          #navItem:hover{
              color: #E55472 !important;
            }
            .btn{
              background-color: #E55472;
              color: white;
              border-radius: 20px;
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
            <a class="nav-link text-dark" id="navItem" href="{{'/shop'}}">SHOP</a>
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

            <div class="container-fluid d-flex justify-content-around mt-5">
               @foreach ($products as $p) 
               <div class="card border border-0"> 
                <img class="card-img-top" src="{{asset('images/'.$p->product_image)}}" alt="Card image"> 
                <div class="card-body"> 
                  <p class="card-text text-uppercase small">{{$p->product_name}}</p> 
                </div> <div class="card-footer"> 
                  <p>${{$p->product_price}}.00</p> 
                  <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$p->id}}">
                    <button class="btn">Add to cart</button>
                  </form>
                </div> 
              </div>
               @endforeach 
            </div>






                  {{-- footer --}}
                  <footer class="container-fluid bg-dark p-5 d-flex" style="font-size: 12px">
                    <div class="container p-2 text-center">
                      <p class="text-light">MY ACCOOUTS</p>
                      <a href=""><i class="fa-brands fa-facebook-f text-secondary pr-2"></i></a>
                      <a href=""><i class="fa-brands fa-twitter text-secondary px-2"></i></a>
                      <a href=""><i class="fa-brands fa-instagram text-secondary px-2"></i></a>
                      <a href=""><i class="fa-brands fa-pinterest-p text-secondary px-2"></i></a>
                    </div>
                    {{-- contacts --}}
      
                    <div class="border-right "></div>
      
                    <div class="container p-2">
                      {{-- location --}}
                      <div class="d-flex">
                        <i class="fa-solid fa-location-dot p-1 text-secondary"></i>
                        <a href="" class="text-secondary px-2" id="tele">Benha, Qalyubia, Egypt</a>
                      </div>
                      {{-- telephone --}}
                      <div class="d-flex">
                        <i class="fa-solid fa-phone p-1 text-secondary"></i>
                        <a href="tel:01028227254" class="text-secondary px-2" id="tele">01028227254</a>
                      </div>
                      {{-- email --}}
                      <div class="d-flex">
                        <i class="fa-regular fa-envelope p-1 text-secondary"></i>
                        <a href="mailto:enas10918@gmail.com?subject=Hello&body=I%20have%20a%20question"
                         class="text-secondary px-2" id="tele">enas10918@example.com</a>
                      </div>
                    </div>
                    
                    <div class="border-right "></div>
      
                    <div class="container p-2 m-auto">
                      <p class="text-secondary">© 2023 - JUST FOR YOU</p>
                    </div>
                  </footer>



      
</body>
</html>