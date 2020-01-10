@extends('welcome')
@section('content')

 <div class="row">
           <div class="col-md-12">
            <p>
              <a href="{{ route('addcategory') }}" class="btn btn-danger">Add Category</a>
              <a href="{{ route('allcategory') }}" class="btn btn-info">All Category</a>
               <a href="{{ route('allpost') }}" class="btn btn-primary">All Post</a>

               @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
            </p>

            
             
              <form action="{{ route('storepost') }}" method="post" enctype="multipart/form-data">
                @csrf
                              <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <label>Post Title</label>
                                <input type="text" class="form-control" name="post_title" id="exampleInputEmail1" placeholder="Post title">
                              </div>
                              <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                  @foreach($category as $row)
                                  <option value="{{ $row->id}}">{{$row->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Post Image</label>
                                <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="Enter Your Image">
                              </div>
                              <!--
                              <div class="form-group">
                                <input type="number" class="form-control" name="telephone" id="exampleInputPassword1" placeholder="Telephone" required>
                              </div>
                              -->
                               <div class="form-group">
                                <label>Post Details</label>
                                    <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3" Placeholder="Post Details" required></textarea>
                                </div>
                              <button type="submit" class="btn btn-primary my_button">Submit</button>
                            </form>
           </div>
          </div>

@endsection