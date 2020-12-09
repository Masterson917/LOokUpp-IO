<?php

namespace App\Http\Controllers;


use App\Library\IPAPI;
use App\Library\sHelper;
use App\Models\Post;
use App\Models\User;
use LaraStuffs\VidyoToken\VidyoToken;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
	


 public function help(Request $request)
    {


        //$nearby = $user->findNearby();



        return view('help');
        //return view('nearby.index', compact('user', 'nearby'));


    }

public function privacy(Request $request)
    {


        //$nearby = $user->findNearby();



        return view('privacy');
        //return view('nearby.index', compact('user', 'nearby'));


    }


    public function Terms(Request $request)
    {


        //$nearby = $user->findNearby();



        return view('Terms');
        //return view('nearby.index', compact('user', 'nearby'));


    }


public function gsearch(Request $request){


        $s = $request->input('s');
        if (empty($s)) return redirect('/');




        

       $users = User::where('name', 'like', '%'.$s.'%')->orWhere('username', 'like', '%'.$s.'%')
       ->orWhere('skill', 'like', '%'.$s.'%')->orWhere('skill2', 'like', '%'.$s.'%')->orWhere('skill3', 'like', '%'.$s.'%')->orderBy('rate', 'DESC')->get();


            
        return view('guest-search', compact('users'));

    }

}