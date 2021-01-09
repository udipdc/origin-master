@extends('layouts.app')
@section('content')
<section class="gallery-section">
  <div class="container">
      <div class="gallery-box iso-call col3">
          <!-- Pratapbhai Bharad -->
          @foreach($userImages as $key => $value)
              <div class="gallery-post">
                  <img src="{{ url('gallery/'.$value->image) }}" alt="{{ $value->image }}">
                  <div class="hover-box">
                      <h2>
                          <a href="{{ url('gallery/'.$value->image) }}" alt="{{ $value->image }}" class="image-popup">{{ $value->image_name }}</a>
                      </h2>
                  </div>
              </div>
          @endforeach
      </div>
      <div class="center-button">
          {!! $userImages->render() !!}
      </div>
  </div>
</section>
@endsection
