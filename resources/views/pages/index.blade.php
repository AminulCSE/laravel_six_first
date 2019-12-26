@extends('welcome')

@section('slider')
<header class="masthead" style="background-image: url({{ asset('public/frontend/img/home-bg.jpg')  }})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection()





@section('posts')

<div style="width: 60%; margin: auto; border: none;">
  @foreach($allposts as $val)
    <div class="col">
      <a href="{{ URL::to('single_post_view/'.$val->id) }}"><img src="{{ URL::to($val->image) }}" style="height: 300px; width: 500px;"></a>
      <h2><a href="">{{ $val->title }}</a></h2><br>
      <p class="post-meta">Category name: {{ $val->name }},
              Slug name:<a href="#"> {{ $val->slug }}</a>
             {{ $val->created_at }}</p>
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="{{ URL::to('single_post_view/'.$val->id) }}">Read more &rarr;</a>
      </div>
    </div>
    <br><hr>
    @endforeach

    {{ $allposts->links() }}
</div>





<div class="col-md-12" style="margin: auto;">
    
</div>

@endsection