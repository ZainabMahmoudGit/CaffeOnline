@extends('layouts.app')

@section('contentnav')
@foreach($websiteinfos as $websiteinfo)
<div class="icon_one">
                    <span><i class="fa-solid fa-square-envelope" style="color: #f58eca;"></i></span>
                        <span class="icon_first">{{ $websiteinfo->WebsiteEmail }} </span>
                    <span class="icon_second"><i class="fa-solid fa-phone-volume" style="color: #f48ac8;"></i></span>
                        <span>{{ $websiteinfo->WebsitePhone }}</span>
                </div>
                <ul class="navbar-nav ms-auto">
                
    
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">   <span><i class="fa-solid fa-circle-user" style="color: #f48ac8;"></i>
                                </span>
                                    <a style="display: inline-block;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                     <span ><i class="fa-solid fa-lock" style="color: #e38be5;"></i>
                        </span>
                                    <a style="display: inline-block;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
         
        </nav>
     
        <div id="app">
    <div class="second_nav">
        <div class="nav__logo">{{ $websiteinfo->WebsiteName }}</div>
        @endforeach
@endsection
