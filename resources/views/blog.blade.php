@extends('layouts.app')
@section('content')
<section class="blog-section">
  <div class="container">

      <p class="page-description">
          See what is cooking in pur website <br> We got some interesting topics just for you
      </p>

      <div class="blog-box iso-call">
          <!-- Pratapbhai Bharad -->
          @foreach($blogImages as $key => $value)
              <div class="blog-post">
                  <img src="{{ url('blogs/'.$value->blog_image) }}" alt="{{ $value->blog_image }}">
                  <div class="hover-post">
                      <h2>
                          <a href="{{ $value->blog_link }}">{{ $value->blog_name }}</a>
                      </h2>
                  </div>
              </div>
          @endforeach
      </div>
      <div class="center-button">
          {!! $blogImages->render() !!}
      </div>
  </div>
</section>
@endsection
