<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class PostController extends Controller
{

	//Category post code are here
    public function Post(){
    	$category=DB::table('categories')->get();
    	return view('blog', compact('category'));
    }

    //store post code are here

    public function StorePost(Request $request){
    	
    	 $validatedData = $request->validate([
        'post_title' => 'required|max:25',
        'details' => 'required|max:25',
        'image'=> 'required | mimes:jpeg,jpg,png | max:1000',
    ]); 

    $data=array();
    $data['post_title']=$request->post_title;
    $data['category']=$request->category_id;
    $data['details']=$request->details;
    $image=$request->file('image');

   if($image){
   		$image_name=hexdec(uniqid());
   		$ext=strtolower($image->getClientOriginalExtension());
   		$image_full_name=$image_name.'.'.$ext;
   		$upload_path='public/images/';
   		$image_url=$upload_path.$image_full_name;
   		$success=$image->move($upload_path,$image_full_name);
   		$data['image']=$image_url;
   		DB::table('posts')->insert($data);
   		

   		$notification=array(
    			'message'=>'Post Inserted Successfully',
    			'alert-type'=>'success'

    		);
    		return Redirect()->back()->with($notification);
   }

   else{
   		DB::table('posts')->insert($data);
   		$notification=array(
    			'message'=>'Post Inserted Successfully',
    			'alert-type'=>'success'

    		);
    		return Redirect()->back()->with($notification);
   }	
    }

    //Allpost code are here

    public function AllPost(){
    	$post=DB::table('posts')->get();
    	return view('allpost', compact('post'));
    }

    //edit post code are here
    public function EditPost($id){
    	$category=DB::table('categories')->get();
    	$post=DB::table('posts')->where('id', $id)->first();

    	return view('editpost', compact('category','post'));
    }

    //update post code are here

    public function UpdatePost(Request $request,$id){
    	$validatedData = $request->validate([
        'post_title' => 'required|max:25',
        'details' => 'required|max:25',
        'image'=> 'required | mimes:jpeg,jpg,png | max:1000',
    ]); 

    $data=array();
    $data['post_title']=$request->post_title;
    $data['category']=$request->category_id;
    $data['details']=$request->details;
    $image=$request->file('image');

   if($image){
   		$image_name=hexdec(uniqid());
   		$ext=strtolower($image->getClientOriginalExtension());
   		$image_full_name=$image_name.'.'.$ext;
   		$upload_path='public/images/';
   		$image_url=$upload_path.$image_full_name;
   		$success=$image->move($upload_path,$image_full_name);
   		$data['image']=$image_url;
   		//unlink($request->old_photo);
   		DB::table('posts')->where('id', $id)->update($data);
   		

   		$notification=array(
    			'message'=>'Post Inserted Successfully',
    			'alert-type'=>'success'

    		);
    		return Redirect()->route('allpost')->with($notification);
   }

   else{
   		$data['image']=$request->old_photo;
   		DB::table('posts')->where('id', $id)->update($data);
   		$notification=array(
    			'message'=>'Post Inserted Successfully',
    			'alert-type'=>'success'

    		);
    		return Redirect()->route('allpost')->with($notification);
   }	
    }

    //view post code are here

    public function View($id){
    	$viewpost=DB::table('posts')->where('id', $id)->first();
    	return view('viewpost')->with('view',$viewpost);

    }

    public function Delete($id){
    	$delete=DB::table('posts')->where('id',$id)->delete();
    	 if($delete){
    	 	$notification=array(
    	 		'message'=>'Post Delete Successfully',
    	 		'alert-type'=>'success'
    	 	);
    	 	return Redirect()->back()->with($notification);

    	 }
    	 else{
    	 	$notification=array(
    	 		'message'=>'Something went wrong',
    	 		'alert-type'=>'error'
    	 	);
    	 	return Redirect()->back()->with($notification);
    	 }
    }
}
