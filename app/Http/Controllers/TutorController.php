<?php
namespace App\Http\Controllers;


use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;


class TutorController extends controller
{
	
	public function tutorsettings( request $request){

		$uid = Auth::user()->id;

		$sk1 = $request->input("skill");
		$sk2 = $request->input("skill2");
		$sk3 = $request->input("skill3");
		$sk4 = $request->input("money");

		DB::table('users')->where('id','=',$uid)->update(['skill' => $sk1, 'skill2' => $sk2, 'skill3' => $sk3, 'money' => $sk4]);
		
		return redirect('settings');
	}





} 