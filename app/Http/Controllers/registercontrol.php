<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
class registercontrol extends Controller
{
    function save(Request $req)
    {
        //print_r($req->input());
        $user= new Register();
        $user->username=$req->username;
        $user->password=$req->password;
        $user->email=$req->email;
        $user->mobile=$req->mobile;
        $user->salary=$req->salary;
        $user->job=$req->job;
        $user->image=$req->image;
        $user->dateofbirth = $req->year . '-' . $req->month . '-' . $req->day;
        $user->gender=$req->gender;
       
        echo $user->save();
        
        if ($user->uid) {
        	$req->session()->flash('regMsg', "Registration Successfull");
            return redirect()->route('public.index');
       
        }else{
        	$req->session()->flash('regMsg', "Error occured");
        	return redirect()->route('public.index');
        }
    }
}
