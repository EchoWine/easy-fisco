<?php

namespace Nut\Http\Controllers;
use Request;

class DashboardController extends Controller{
   
	public function index(Request $request){
		return view('Nut::dashboard');
	}

}
