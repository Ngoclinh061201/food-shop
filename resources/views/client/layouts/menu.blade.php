<?php
use Illuminate\Support\Facades\Auth;
?>
<!-- Main Menu Section -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Vegefoods</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="{{url('/shop')}}">Shop</a>
                <a class="dropdown-item" href="{{url('/wishlist')}}">Wishlist</a>
                <a class="dropdown-item" href="{{url('/product-single')}}">Product Single</a>
                <a class="dropdown-item" href="{{url('/cart')}}">Cart</a>
                <a class="dropdown-item" href="{{url('/checkout')}}">Checkout</a>
            </div></li>
          <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">About</a></li>
          <li class="nav-item"><a href="{{url('/blog')}}" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
          <li class="nav-item cta cta-colored"><a href="{{url('/cart')}}" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

        </ul>
      </div>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            @if(empty(auth()->user()->name))
                <li class="nav-item"><a href="login" class="nav-link">Đăng nhập</a></li>
                <li class="nav-item"><a href="register" class="nav-link">Đăng ký</a></li>
            @else
                <a class="nav-item"  href="{{url('dashboard')}}">{{auth()->user()->name}}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            @endif
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->