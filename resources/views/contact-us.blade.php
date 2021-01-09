@extends('layouts.app')

@section('content')

<!-- contact-section 
================================================== -->
<section class="contact-section">
    <div class="contact-box">
        <div class="contact-title">
            <h1>CONTACT</h1>
            <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a></li>
                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a class="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a></li>
                <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
        </div>

        <p class="desc">I have a passion for nature photography. I want to share with you my search for capturing a photo-of-a-lifetime that, when enlarged and hung on the wall, </p>

        <p>
            <span>Pratapbhai Bharad</span>
            <span>pratap@gmail.com</span>
            <span>+91 89059 87555</span>
            <span>B-9/10, noble society, near eklavya public school, zanzarda road, junagadh</span>
        </p>
    </div>
    <div class="image-holder">
        <!-- <img src="{{ url('front/images/contactus.jpg') }}" alt=""> -->
        <img src="{{ url('front/images/'.$userData->contact_image) }}" alt="$userData->contact_image">
    </div>
</section>
<!-- End contact section -->

@endsection

