<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Register;

class RegisterController extends Controller
{
    public function store(){
    	// 

    	$data = Input::except(array('_token'));
    	// var_dump($data);

       $rule =array(

       'name' =>'required',
       'email' =>'required|email',
       'password' =>'required|min:8',
       'confirm_password' =>'required|same:password'

       );

       $message = array(
        
         'confirm_password.required'=>'The confirm password is required',
         'confirm_password.min'=>'The confirm password must be at list 8 characters',

           'confirm_password.same'=>'The password and confirm password does not same'
      
       );

       $validator = validator::make($data,$rule,$message);


       if ($validator->fails()) {
       	// echo "Yes fails";
       	return Redirect::to('register')->withErrors($validator);
       }

       else
       	
        Register::formstore(Input::except(array('_token', 'confirm_password')));
        return Redirect::to('register')->with('success','Successfully registered!');
    }
}
