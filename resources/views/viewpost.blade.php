@extends('welcome')
@section('content')

 <div class="row">
           <div class="col-md-12">
            <p>
              <a href="{{ route('allpost') }}" class="btn btn-info">All Post</a>
            </p>
            
              <table class="table table-responsive">
                <tr>
                  <th>ID</th>
                  <th>Post Title</th>
                  <th>Category</th>
                  <th>Post Image</th>
                  <th>Details</th>
                </tr>
                <tr>
                  <td>{{ $view->id }}</td>
                  <td>{{ $view->post_title }}</td>
                  <td>{{ $view->category }}</td>
                    <td><img src="{{ URL::to($view->image) }}" style="height: 40px; width: 70px;"></td>
                   <td>{{ $view->details }}</td>
                  
                </tr>
              </table>
             
             
           </div>
          </div>

@endsection