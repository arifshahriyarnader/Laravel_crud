@extends('welcome')
@section('content')

 <div class="row">
           <div class="col-md-12">
            <p>
              
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

            
             
              <form action="{{ url('update/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                              <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <label>Post Title</label>
                                <input type="text" class="form-control" value="{{ $post->post_title }}" name="post_title" id="exampleInputEmail1" placeholder="Post title">
                              </div>
                              <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                  @foreach($category as $row)
                                  <option value="{{ $row->id}}" <?php if($row->id == $post->category) echo "selected"; ?>> {{$row->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label>New Image</label>
                                <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="Enter Your Image">
                               Old Image: <img src="{{URL::to($post->image)}}" style="height:40px; width:40px;">
                               <input type="hidden" name="old_photo" value="$post->image">
                              </div>
                              
                               <div class="form-group">
                                <label>Post Details</label>
                                    <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3" Placeholder="Post Details" required>
                                      {{$post->details}}
                                    </textarea>
                                </div>
                              <button type="submit" class="btn btn-primary my_button">Update</button>
                            </form>
           </div>
          </div>

@endsection