<?php

namespace Api\Http\Controllers;
use Request;

class WelcomeController extends Controller{
   
	public function index(Request $request){
		return view('Api::welcome');
	}

}
