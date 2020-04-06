<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfilePicRequest;
use Illuminate\Support\Facades\DB;
use App\User;

class AccountController extends Controller
{
    public function editProfile(Request $request)
    {
    	$user = User::find($request->session()->get('loggedUser'));
    	$genderList = Gender::all();
    	$religionList = Religion::all();
    	$bloodList = Blood::all();
    	$complexionList = Complexion::all();
    	$statusList = MaritalStatus::all();
    	return view('user.account.update-profile')
    			->with('user', $user)
    			->with('genderList', $genderList)
    			->with('religionList', $religionList)
    			->with('bloodList', $bloodList)
    			->with('complexionList', $complexionList)
    			->with('statusList', $statusList);
    }
}