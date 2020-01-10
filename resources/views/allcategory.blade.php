@extends('welcome')
@section('content')

 <div class="row">
           <div class="col-md-12">
            <p>
              <a href="{{ route('addcategory') }}" class="btn btn-danger">Add category</a>
              <a href="{{ route('allcategory') }}" class="btn btn-info">All category</a>
            </p>

            <table class="table table-responsive">
              <tr>
                <th>ID</th>
                <th>Category Name</th>
               <th>Slug Name</th>
                <th>Action</th>
                
              </tr>
              @foreach($category as $row)
              <tr>
                <td>{{ $row->id }}</td>
                 <td>{{ $row->name}}</td>
                  <td>{{ $row->slug}}</td>
                   <td>
                     <a href="{{ url('editcategory', $row->id)}}" class="btn btn-info">Edit</a>
                      <a href="{{ url('deletecategory', $row->id)}}" class="btn  btn-danger">Delete</a>
                      <!-- <a href="{{ URL::to('categoryview'.$row->id) }}" class="btn btn-sm btn-success">View</a> -->
                      <a href="{{ url('categoryview', $row->id)}}" class="btn btn-success ">View</a>
                   </td>
              </tr>
              @endforeach

            </table>

        
             
             
           </div>
          </div>

@endsection