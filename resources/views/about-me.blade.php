@extends('layouts.app')

@section('content')

    <!-- {{ asset('front/images/loader.gif') }} -->
    <!-- asset('front/images/') -->

    <!-- about-me-section 
      ================================================== -->
    <section class="about-me-section">
      <div class="about-box">
        <h1>AMON RAMIREZ</h1>
        <ul class="social-icons">
          <li><a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a></li>
          <li><a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a></li>
          <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a class="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a></li>
          <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
        </ul>
        <p class="desc">I have a passion for nature photography. I want to share with you my search for capturing a photo-of-a-lifetime that, when enlarged and hung on the wall, </p>

        <p>For quality results from any camera, the basics of photography still apply no matter how an image is captured. A tripod is always important if slow shutter speeds are needed and big telephoto lenses are used. Fast shutter speeds remain a key way to stop action, and f-stops continue to affect depth of field. The important parts of a scene still need to have the focus centered on them, and dramatic light always helps make for dramatic photos.</p>

        <p>Photography is the art, application and practice of creating durable images by recording light or other electromagnetic radiation, either electronically by </p>

        <p>
          <span>Clients: Riko, PAG, Mr. Bon, James Hayden, Guci</span>
          <span>Industry: Sports, News, Lifestyle, Traveling</span>
        </p>
      </div>
      <div class="image-holder">
        <img src="{{ asset('front/upload/others/ab1.jpg') }}" alt="">
      </div>
    </section>
    <!-- End about-me section -->

@endsection

