@extends('welcome')
@section('content')

 <div class="row">
           <div class="col-md-12">
            <p>
              <a href="{{ route('addcategory') }}" class="btn btn-danger">Add category</a>
              <a href="{{ route('allcategory') }}" class="btn btn-info">All category</a>
            </p>

         @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
             
              <form action="{{ url('update',$category->id) }}" method="post">
                @csrf
                              <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" value="{{ $category->name}}" name="category_name">
                              </div>
                               <div class="form-group">
                                <label>Slug Name</label>
                                <input type="text" class="form-control" value="{{ $category->slug}}" name="slug_name">
                              </div>
                              <button type="submit" class="btn btn-primary my_button">Update</button>
                            </form>
           </div>
          </div>

@endsection