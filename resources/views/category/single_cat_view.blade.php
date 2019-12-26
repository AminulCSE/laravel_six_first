@extends('welcome')
@section('addpost')
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
  	<div class="col-md-12">
    	<a href="{{ route('show_cat') }}" class="btn btn-danger">Show category</a>
    </div>
    <h1 class="display-4">Show Category</h1>


    
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">Slug name</th>
      <th scope="col">Created date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">{{ $cat->id }}</th>
      <td>{{ $cat->name }}</td>
      <td>{{ $cat->slug }}</td>
      <td>{{ $cat->created_at }}</td>
      <td>
          <a href="{{ route('add_category') }}">Add category</a>
      </td>
    </tr>

  </tbody>
</table>


  </div>
</div>



@endsection