<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Library\GoogleMapsHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NearbyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {

        $user = Auth::user();
        $nearby = $user->findNearby();

        
            
        //App::call('App\Http\Controllers\FindLocationController@index');

        return view('nearby.index', compact('user', 'nearby'));
    }

    public function meet(){
        
        $user = Auth::user();

        return view('profile.meet', compact('user'));
    }

}
