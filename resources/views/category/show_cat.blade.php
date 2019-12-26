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

        @foreach($category as $val)
        <tr>
          <th scope="row">{{ $val->id }}</th>
          <td>{{ $val->name }}</td>
          <td>{{ $val->slug }}</td>
          <td>{{ $val->created_at }}</td>
          <td>
              <a href="{{ URL::to('single_cat_edit/'.$val->id) }}">Edit</a>||
              <a href="{{ URL::to('single_cat_delete/'.$val->id) }}" id="delete">Delete</a>||
              <a href="{{ URL::to('single_cat_view/'.$val->id) }}">View</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>


@endsection