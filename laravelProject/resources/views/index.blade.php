<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">        
        <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
        {{-- <link rel="stylesheet" href={{asset('css/style.css')}}> --}}
        <style>
          body{font-family: 'Montserrat'}
            main{
              background-image: url('images/3.jpg');
              background-size: cover;
              height: 100vh;
            }

            .btn{
              background-color: #E55472;
              color: white;
              border-radius: 20px;
            }

            .btn:hover{background-color: darkgray;
            color: white;
            transition: 0.2s}

            i{color: #E55472}

            #navItem:hover{
              color: #E55472 !important;
            }
            .banner {
            background-image: url('images/banner1.jpg');
            background-size: cover;
            height: 160px;
            width: 45%;
            cursor: pointer;
            transition: transform 0.3s ease;
            }

            #b2{
              background-image: url('images/banner2.jpg');
              background-size: cover;
            }
            #b1:hover{
              transform: scale(1.1);
            }
            #b2:hover{
              transform: scale(1.1);
            }
            #service-container, .sponser{
              background-color: rgb(243, 242, 242);
              border: 1px solid rgb(233, 233, 233);
              font-size: 12;
            }
            #serivce-text{font-size: 70%;}
            .fa-brands:hover{
              color: #E55472 !important;
              transition: 0.3s;
            }
            #tele:hover{
              color: #E55472 !important;
              text-decoration: none !important;
              transition: 0.3s;
            }
            .search-div{
              background-image: url('images/image.jpg');
              background-size: cover;
              height: 60vh;
            }
            .sh-txt{
              text-shadow: 4px 4px 4px rgb(56, 56, 56) ;
            }
            .form-control{
              width: 75%;
              border-radius: 20px 0px 0px 20px;
            }
            .submit{
              height: 40px;
              margin: 0;
              border-radius: 00px 20px 20px 0px;
              background-color: #E55472;
              color: white;
              border: none;
            }
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

          <main class="container-fluid main mt-4 d-flex justify-content-center align-items-center">
            <div class="container-fluid">
              <p style="color: #E55472">FLOWER & GIFT</p>
              <h2 class="font-weight-bolder">GET UP TO 75%</h2>
              <p>Adorable flowers and gifts for you beloved family and friends.</p>
              <button class="btn">Shop Now</button>
            </div>
          </main>

            {{-- title best sellers --}}
            <h4 class="d-flex justify-content-center pt-5">BEST SELLERS</h4>

            {{-- 4 best sellers --}}
            <div class="container-fluid d-flex justify-content-around ">
               @foreach ($product as $p) 
               <div class="card border border-0" style="width:200px"> 
                <img class="card-img-top" src="{{asset('images/'.$p->product_image)}}" alt="Card image"> 
                <div class="card-body"> 
                  <i class="fa-solid fa-star"></i> 
                  <i class="fa-solid fa-star"></i> 
                  <i class="fa-solid fa-star"></i> 
                  <i class="fa-solid fa-star"></i> 
                  <i class="fa-solid fa-star"></i> 
                  <p class="card-text text-uppercase small">{{$p->product_name}}</p> 
                </div> <div class="card-footer"> 
                  <p>${{$p->product_price}}.00</p> 
                  <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$p->id}}">
                    <button class="btn">Add to cart</button>
                  </form>
                </div> 
              </div> @endforeach 
            </div>

            {{-- banners --}}
            <div class="container-fluid d-flex justify-content-around mt-5" style="overflow: hidden">
              <div class="banner" id="b1"></div>
              <div class="banner" id="b2"></div>
            </div>
            
            {{-- services --}}
            <div class="container-fluid d-flex justify-content-around mt-5 mb-5 p-3"  id="service-container">
              <div class="container d-flex justify-content-around">
                <div class="px-3">
                  <img src="images/8-trolley.svg" alt="" width="40px" height="40px">
                </div>
                <div>
                  <p id="serivce-text">Free shipping</p>
                  <p class="text-secondary" id="serivce-text">On all orders over $49.00</p>
                </div>
              </div>

              <div class="container d-flex justify-content-around">
                <div class="px-3">
                  <img src="images/9-money.svg" alt="" width="40px" height="40px">
                </div>
                <div>
                  <p id="serivce-text">15 days returns</p>
                  <p class="text-secondary" id="serivce-text">Moneyback guarantee</p>
                </div>
              </div>

              <div class="container d-flex justify-content-around">
                <div class="px-3">
                  <img src="images/10-credit-card.svg" alt="" width="40px" height="40px">
                </div>
                <div>
                  <p id="serivce-text">Secure checkout</p>
                  <p class="text-secondary" id="serivce-text">Protected by Paypal</p>
                </div>
              </div>

              
              <div class="container d-flex justify-content-around">
                <div class="px-3">
                  <img src="images/11-gift-card.svg" alt="" width="40px" height="40px">
                </div>
                <div>
                  <p id="serivce-text">Offer & gift here</p>
                  <p class="text-secondary" id="serivce-text">On all orders over</p>
                </div>
              </div>
            </div>


          {{-- search form --}}
            <div class="container-fluid pr-5 search-div text-center p-4">
              <h2 class="text-light sh-txt">Explore More!</h2>
              <h4 class="text-light sh-txt">Search For Our Products</h4>
              <form class="pt-4" action="{{'/search'}}" method="get">
                <input class="form-control d-inline" type="search" name="search" placeholder="Search here...">
                <button class="d-inline submit" type="submit">Search</button>
              </form>
            </div>

            {{-- sponsers --}}
            <div class="container-fluid mt-5 row justify-content-around sponser p-3">
              <img src="images/florist.png" alt="" width="70px" height="60px">
              <img src="images/nature.png" alt="" width="70px" height="60px">
              <img src="images/anna.png" alt="" width="70px" height="60px">
              <img src="images/leaf.png" alt="" width="70px" height="60px">
              <img src="images/gs.png" alt="" width="70px" height="60px">
              <img src="images/florist.png" alt="" width="70px" height="60px">
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
