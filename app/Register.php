<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Input;
use Hash;


class Register extends Authenticatable
{

	protected $table = "register_users";
    public static function formstore($data){
    	// echo"here is the model";
    	// var_dump($data);

    	$username = Input::get('name');
    	// echo "$username";
    	$email = Input::get('email');
    	// echo "$email";
    	$password = Hash::make(Input::get('password'));
    	// echo "$password ";

    	$users = new Register();

    	$users->name=$username;
    	$users->email=$email ;
    	$users->password=$password;
    	

    	$users->save();


    } 
}
