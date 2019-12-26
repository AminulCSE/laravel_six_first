@extends('welcome')
@section('addpost')
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
  	<div class="col-md-12">
    	<a href="{{ route('show_cat') }}" class="btn btn-danger">Show category</a>
    </div>
    <h1 class="display-4">Add Category</h1>


    
@if ($errors->any())
    <div class="alert alert-danger col-md-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="col-md-6">
    	<form action="{{ route('store_category') }}" method="post">
    		@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Category name</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Slug name</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" name="slug">
		  </div>
		  <button type="submit" class="btn btn-primary">Add post</button>
		</form>
    </div>


  </div>
</div>
@endsection