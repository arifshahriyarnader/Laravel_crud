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
                </tr>
                <tr>
                  <td>{{ $cat->id }}</td>
                  <td>{{ $cat->name }}</td>
                  <td>{{ $cat->slug }}</td>
                </tr>
              </table>
             
             
           </div>
          </div>

@endsection