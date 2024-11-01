


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styless.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap"
        rel="stylesheet">
<!--new css js-->
        <link href="{{ asset('cssnew/bootstrap.min.css') }}" rel="stylesheet">

<link href="{{ asset('cssnew/bootstrap-icons.css') }}" rel="stylesheet">

<link href="{{ asset('cssnew/vegas.min.css') }}" rel="stylesheet">

<link href="{{ asset('cssnew/tooplate-barista.css') }}" rel="stylesheet">

<script src="{{ asset('jsnew/jquery.min.js') }}"></script>
<script src="{{ asset('jsnew/bootstrap.min.js') }}"></script>
<script src="{{ asset('jsnew/jquery.sticky.js') }}"></script>
<script src="{{ asset('jsnew/click-scroll.js') }}"></script>
<script src="{{ asset('jsnew/vegas.min.js') }}"></script>
<script src="{{ asset('jsnew/custom.js') }}"></script>

    <title>Customer | Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    @vite(['public/app.scss', 'public/js/app.js'])

    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Link Swiper's CSS -->
   
      <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,400;0,500;0,700;0,800;0,900;1,500&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<script src="{{ asset('js/cart.js') }}"></script>


    <title>E-commerce Website</title> -->

    
    <script src="https://kit.fontawesome.com/6700b6d260.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/customer.js') }}"></script>

    <link href="{{ asset('cssnew/bootstrap.min.css') }}" rel="stylesheet">

<link href="{{ asset('cssnew/bootstrap-icons.css') }}" rel="stylesheet">

<link href="{{ asset('cssnew/vegas.min.css') }}" rel="stylesheet">

<link href="{{ asset('cssnew/tooplate-barista.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('cssnew/bootstrapproduct.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cssnew/style.css') }}" rel="stylesheet">

  
<script src="{{ asset('jsnew/jquery.min.js') }}"></script>
<script src="{{ asset('jsnew/bootstrap.min.js') }}"></script>
<script src="{{ asset('jsnew/jquery.sticky.js') }}"></script>
<script src="{{ asset('jsnew/click-scroll.js') }}"></script>
<script src="{{ asset('jsnew/vegas.min.js') }}"></script>
<script src="{{ asset('jsnew/custom.js') }}"></script>
  
    

</head>
<body>

            <nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo Section   Barista-->
        
        <a class="navbar-brand d-flex align-items-center" href="{{ route('products.index') }}">
        <img src="{{ asset('images/coffee-beans.png') }}" class="navbar-brand-image img-fluid" alt="Barista Cafe Template">
 
                            {{ $websiteinfos->WebsiteName ?? 'No Name Available' }}
                        </a>

        <!-- Toggle button for small screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.index')}}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">Our Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about.index')}}">ABOUT</a>
                </li>

                @can('is-admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contactus.index')}}">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dash.index')}}">Dash</a>
                </li>
                @endcan
                
              
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contactus.create')}}">CONTACT</a>
                </li>
               
             
                <li class="nav-item">
            <a href="{{route('wishlist.index')}}" id="wishlistLink" class="nav-link">wishlist
                </a></li>
                <li class="nav-item">
                <a href="{{route('cart.index')}}"  id="cartLink" class="nav-link">Cart
                </a>
                </li>
            </ul>

            <!-- Wishlist and Cart Icons -->
            <div class="ms-lg-3 d-flex align-items-center">
            
                <!-- User Authentication Section -->
                <ul class="navbar-nav ms-auto" style="display:inline-block">
                    @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <span><i class="fa-solid fa-circle-user" style="color: black;"></i></span>
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

   
     
          
            @yield('content')
    
  
   
               <footer>
           <div class="footer" style="color: white;">
               <div class="row">
                   <div class="col-4">
                       <ul>
                           <p>HELP</p>
                           <li>Payment </li><br>
                           <li>Delivery </li><br>
                           <li>Returns & Refunds </li>
                           
   
                       </ul>
                   </div>
                   <div class="col-4">
                       <i class="fa-solid fa-leaf logo"></i>
                       <h2>{{ $websiteinfos->WebsiteName ?? 'No Name Available' }}</h2>
                   </div>
                   <div class="col-4">
                       <table>
                           <tr>
                               <td>
                                   <i class="fa-brands fa-facebook-f"></i>
                               </td>
                               <td>
                                   <p>FACEBOOK</p>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <i class="fa-brands fa-square-instagram"></i>
                               </td>
                               <td>
                                   <p>INSTAGRAM</p>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <i class="fa-brands fa-twitter"></i>
                               </td>
                               <td>
                                   <p>TWITTER</p>
                               </td>
                           </tr>
                       </table>
   
                   </div>
   
               </div>
               <P class="rights">@ITI 2023, ALL RIGHTS RESERVED.</P>
           </div>
   
       </footer>
            
   
</body>
</html>

