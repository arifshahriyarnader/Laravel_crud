<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BoloController extends Controller
{
    
    public function Add(){
    	return view('addcategory');
    }
    
    public function Store(Request $request){
    	//validation
    	/* $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug' => 'required|unique:categories|max:25|min:4',
    ]); */

    	$data=array();
    	$data['name']=$request->category_name;
    	$data['slug']=$request->slug_name;
    	$category=DB::table('categories')->insert($data);
    	//json format
    	//return response()->json($data);
    	//array format
    	//echo "<pre>";
    	//print_r($data);

    	if($category){
    		$notification=array(
    			'message'=>'Categories Inserted Successfully',
    			'alert-type'=>'success'

    		);
    		return Redirect()->back()->with($notification);
    	}

    	else{
    		$notification=array(
    			'message'=>'somthing went wrong',
    			'alert-type'=>'error'
    		);
    		return Redirect()->back()->with($notification);
    	}
    }

    public function All(){
    	$category=DB::table('categories')->get(); //get using for all data show
    	return view('allcategory',compact('category'));
    }
    public function View($id){
    	$category=DB::table('categories')->where('id',$id)->first(); //first using for single data
    	return view('categoryview')->with('cat',$category);
    }

    public function Delete($id){
    	$delete=DB::table('categories')->where('id',$id)->delete();
    	 if($delete){
    	 	$notification=array(
    	 		'message'=>'Data Delete Successfully',
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

    public function Edit($id){
    	$category=DB::table('categories')->where('id',$id)->first();
    	return view('editcategory', compact('category'));

    }

    public function Update(Request $request,$id){
    	$data=array();
    	$data['name']=$request->category_name;
    	$data['slug']=$request->slug_name;
    	$category=DB::table('categories')->where('id',$id)->update($data);



    	if($category){
    		$notification=array(
    			'message'=>'Categories Updated Successfully',
    			'alert-type'=>'success'

    		);
    		return Redirect()->back()->with($notification);
    	}

    	else{
    		$notification=array(
    			'message'=>'Nothing to Update',
    			'alert-type'=>'error'
    		);
    		return Redirect()->back()->with($notification);
    	}


    }
    
    	

    
}
