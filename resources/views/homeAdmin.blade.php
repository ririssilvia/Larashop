@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">
  
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
  
        <h1 class="my-4">HOME</h1>
  
        <!-- Blog Post -->
        @foreach ($data_article as $artic)
        <div class="card mb-4">
            <img class="card-img-top" src="{{$artic->featured_image}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{ $artic->title }}</h2>
            <p class="card-text">{{ Str::limit($artic->content, 100, '...') }}</p>
                <a href="{{ './article/'.$artic->id }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on October 1, 2020 by
                <a href="http://localhost:8000/about" target="_blank">Uswatun Khasanah</a>
            </div>
        </div>
        @endforeach
  
        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
         {{$data_article->links()}}
        </ul>
  
      </div>
  
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        
      <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="/home">WELCOME TO MY WEBSITE </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> 
      <div class="collapse navbar-collapse" id="navbarResponsive"> 
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/contact">Contact
            </a>
          </li>
          @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </ul>
      </div>
    </div>
  </nav>
        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button"><a href="https://www.google.com/" target="_blank">Go!</a></button>
              </span>
            </div>
          </div>
        </div>
  
        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Category</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="https://en.wikipedia.org/wiki/Web_design" target="_blank">Web Design</a>
                  </li>
                  <li>
                    <a href="https://en.wikipedia.org/wiki/HTML" target="_blank">HTML</a>
                  </li>
                  <li>
                    <a href="https://laravel.com/">Laravel</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="https://laravel.com/docs/6.x/routing">Routing</a>
                  </li>
                  <li>
                    <a href="https://laravel.com/docs/6.x/controllers">Controllers</a>
                  </li>
                  <li>
                    <a href="https://laravel.com/docs/6.x/views">Views</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>
  
      </div>
  
    </div>
    <!-- /.row -->
 
  </div>
  @endsection
