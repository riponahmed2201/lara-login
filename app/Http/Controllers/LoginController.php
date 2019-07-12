<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Register;
use Auth;


class LoginController extends Controller
{
    public function login(){
    	// echo "Login test";
    	$data = Input::except(array('_token'));
    	// var_dump($data);

       $rule =array(
       'email' =>'required|email',
       'password' =>'required|min:8',
       

       );

       $validator = validator::make($data,$rule);


       if ($validator->fails()) {
       	// echo "Yes fails";
       	return Redirect::to('signin')->withErrors($validator);
       }

       else
       {
       	// $data = Input::except(array('_token'));
       	// var_dump($data);

       	$userdata = array(

        'email'=>Input::get('email'),
        'password'=>Input::get('password')
       	  );

		       	if (Auth::attemp($userdata)) {
		       		return Redirect::to('');
		       		// echo "yes match";
		       	}

		       	else{
		       		return Redirect::to('signin');
		       		// echo "not match";
		       	}
       }
       	
    }
}
