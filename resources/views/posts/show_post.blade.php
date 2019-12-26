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
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Details</th>
          <th scope="col">Image</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach($posts as $val)
        <tr>
          <th scope="row">{{ $val->id }}</th>
          <td>{{ $val->title }}</td>
          <td>{{ $val->name }}</td>
          <td>{{ $val->details }}</td>
          <td><img src="{{ URL::to($val->image) }}" style="height: 123px; width: 188px;"></td>

          <td>
              <a href="{{ URL::to('single_post_edit/'.$val->id) }}">Edit</a>||
              <a href="{{ URL::to('single_post_delete/'.$val->id) }}" id="delete">Delete</a>||
              <a href="{{ URL::to('single_post_view/'.$val->id) }}">View</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>


@endsection