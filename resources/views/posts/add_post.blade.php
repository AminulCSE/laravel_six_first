@extends('welcome')
@section('addpost')
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4" style="text-align: center;">Add post</h1>
@if ($errors->any())
    <div class="alert alert-danger col-md-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="col-md-8" style="margin: auto;">
    	<form action="{{ route('add_post') }}" method="POST" enctype="multipart/form-data">
    		@csrf
    		<div class="form-group">
			    <select class="form-control" name="category_id">
				  <option selected="">Select category</option>
				  @foreach($category as $val)
				  <option value="{{ $val->id }}">{{ $val->name }}</option>
				  @endforeach
				</select>
		  	</div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Title</label>
		    <input type="text" class="form-control" name="title" id="exampleInputPassword1">
		  </div>

		  

		  <div class="form-group">
		    <label for="exampleFormControlFile1">Image input</label>
    		<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
		  </div>

		  <div class="input-group">
			<div class="input-group-prepend">
			   <span class="input-group-text">Details</span>
			</div>
			<textarea name="details" class="form-control" aria-label="With textarea"></textarea>
		</div><br>


		  <button type="submit" class="btn btn-primary">Add post</button>
		</form>
    </div>


  </div>
</div>
@endsection