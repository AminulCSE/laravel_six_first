@extends('welcome')
@section('addpost')
 <div class="jumbotron jumbotron-fluid">
  <div class="container">

    <div class="col-md-8" style="margin: auto;">
      <h4>{{ $posts->title }}</h4>
      <img src="{{ URL::to($posts->image) }}" style="height: 300px; width: 500px;">
      <a href="#"><h2>{{ $posts->name }}</h2></a>
      <p>{{ $posts->details }}</p>
    </div>


  </div>
</div>



@endsection