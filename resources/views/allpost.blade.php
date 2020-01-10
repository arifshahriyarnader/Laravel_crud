@extends('welcome')
@section('content')

 <div class="row">
           <div class="col-md-12">
            <p>
              <a href="{{ route('blog') }}" class="btn btn-danger">Write Post</a>
              
            </p>

            <table class="table table-responsive">
              <tr>
                <th>ID</th>
                <th>Post title</th>
               <th>Category</th>
               <th>Post Image</th>
                <th>Action</th>
                
              </tr>
              @foreach($post as $row)
              <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->post_title }}</td>
                  <td>{{ $row->category}}</td>
                 <td><img src="{{ URL::to($row->image) }}" style="height: 40px; width: 70px;"></td>
                   <td>
                     <a href="{{ url('edit/post', $row->id)}}" class="btn btn-info">Edit</a>
                      <a href="{{ url('delete/post', $row->id)}}" class="btn  btn-danger">Delete</a>
                      <a href="{{ url('post/view', $row->id)}}" class="btn btn-success ">View</a>
                   </td>
              </tr>
              @endforeach

            </table>

        
             
             
           </div>
          </div>

@endsection