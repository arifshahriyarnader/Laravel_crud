<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function Manus(){
    	return view('contact');
    }
    public function Guru(){
    	echo "Thik ache Guru";
    }
    public function About(){
    	return view('about');
    }
}
