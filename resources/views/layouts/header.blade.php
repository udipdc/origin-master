<!doctype html>


<html lang="en" class="no-js">
<head>
    <!-- Basic page needs
    ============================================ -->
    <title>Pratapbhai Bharad</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/images/admin-small-logo.jpg')}}">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('front/css/shutter-assets.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/custom.css')}}">

</head>
<body>
  <!-- Container -->
  <div id="container">

    <!-- Header
        ================================================== -->
    <header class="clearfix default-header">

      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">

          <!-- {{ public_path('front/images/loader.gif') }} -->

          <a class="navbar-brand" href="{{ url('home') }}">
            <img src="{{ asset('front/images/logo.png') }}" alt="">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li>
                  <a class="active" href="{{ url('home') }}">Home</a>
              </li>
              <li>
                  <a href="{{ url('about-us') }}">About</a>
              </li>
              <!-- <li><a href="#">Features</a>
                <ul class="dropdown">
                    <li><a href="services.html">Services</a></li>
                    <li><a href="comming-soon.html">Comming Soon</a></li>
                    <li><a href="error-404.html">Error 404</a></li>
                </ul>
              </li> -->
              <li>
                  <a href="{{ url('gallery') }}">Gallery</a>
              </li>
              <li>
                  <a href="{{ url('blog') }}">Blog</a>
              </li>
              <li>
                  <a href="{{ url('contact-us') }}">Contact</a>
              </li>
            </ul>
          </div>

          <div class="search-area ml-auto">
            <form class="search-form">
              <input type="search" name="search-elem" id="search-elem" placeholder="Search people, places, whatever..." />
              <button class="submit">
                <i class="fa fa-search"></i>
              </button>
            </form>
          </div>

        </div>
      </nav>

    </header>
    <!-- End Header -->

