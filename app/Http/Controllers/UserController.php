<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $religionList = Religion::all();
        $genderList = Gender::all();
        $loggedUser = User::find($request->session()->get('loggedUser'));
        $userList = $this->suggestUsers($loggedUser);
    	return view('user.index')
                ->with('userList', $userList)
                ->with('religionList', $religionList)
                ->with('genderList', $genderList)
                ->with('minAge', 18)
                ->with('maxAge', 24)
                ->with('selectedRel', 1)
                ->with('selectedGen', 1);
    }
    public function profile(Request $request)
    {
    	$user = User::find($request->session()->get('loggedUser'));
    	$user->bgroup = Blood::find($user->blood)->bgroup;
    	$user->gender_name = Gender::find($user->gender)->gender;
    	$user->religion_name = Religion::find($user->religion)->name;
    	if (isset($user->complexion)) {
    		$user->complexion_name = Complexion::find($user->complexion)->type;
    	}
    	if (isset($user->marital_status)) {
    		$user->status = MaritalStatus::find($user->marital_status)->status;
    	}
    	$user->age = date_diff(date_create($user->dob), date_create('today'))->y;
    	$perAddress = DB::table('tbl_per_address')
    				->join('tbl_police_station', 'tbl_per_address.per_police_station', '=', 'tbl_police_station.id')
    				->join('tbl_district', 'tbl_police_station.district', '=', 'tbl_district.id')
    				->join('tbl_division', 'tbl_district.division', '=', 'tbl_division.id')
    				->select('tbl_per_address.*','tbl_police_station.name as policeStation','tbl_district.name as district','tbl_division.name as division')
    				->where('per_uid',$request->session()->get('loggedUser'))
    				->first();
    	$prAddress = DB::table('tbl_pr_address')
    				->join('tbl_police_station', 'tbl_pr_address.pr_police_station', '=', 'tbl_police_station.id')
    				->join('tbl_district', 'tbl_police_station.district', '=', 'tbl_district.id')
    				->join('tbl_division', 'tbl_district.division', '=', 'tbl_division.id')
    				->select('tbl_pr_address.*','tbl_police_station.name as policeStation','tbl_district.name as district','tbl_division.name as division')
    				->where('pr_uid',$request->session()->get('loggedUser'))
    				->first();
    	$job = Job::find($request->session()->get('loggedUser'));
    	$education = DB::table('tbl_education')
    					->join('tbl_degree', 'tbl_education.degree', '=', 'tbl_degree.id')
    					->where('uid', $request->session()->get('loggedUser'))
    					->first();
    	return view('user.profile')
    			->with('user',$user)
    			->with('perAddress', $perAddress)
    			->with('prAddress', $prAddress)
    			->with('job', $job)
    			->with('education', $education);
    }