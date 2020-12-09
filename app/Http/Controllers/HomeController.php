<?php

namespace App\Http\Controllers;

use App\Library\IPAPI;
use App\Library\sHelper;
use App\Models\Group;
use App\Models\Hobby;
use App\Models\Post;
use App\Models\User;
use LaraStuffs\VidyoToken\VidyoToken;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
    public function index(Request $request)
    {

        $user = Auth::user();


        $groups = Group::join('user_hobbies', 'user_hobbies.hobby_id', '=', 'groups.hobby_id')
            ->where('user_hobbies.user_id', $user->id)->select('groups.*');


   if(isset($user->location->city)){
    $city = $user->location->city;

    }else{
      
     $city = DB::table('cities')->select('id')->where('id', '=' , '1')->get();   

    }         

        


        return view('groups.index', compact('user', 'groups', 'city'));

    }


    public function video(Request $request)
    {

        $username ="larastuffs";
        $user = Auth::user();
        $tok = vidyotoken::generate($username);
        //$nearby = $user->findNearby();



        return view('profile.vid', compact('user', 'tok'));
        //return view('nearby.index', compact('user', 'nearby'));


    }


        public function welcome(Request $request)
    {

        $user = Auth::user();
        //$nearby = $user->findNearby();



        return view('welcome', compact('user'));
        //return view('nearby.index', compact('user', 'nearby'));


    }


     public function feed(Request $request)
    {

        $user = Auth::user();

        $wall = [
            'new_post_group_id' => 0
        ];

        



        return view('home', compact('user', 'wall'));


    }


    public function search(Request $request){


        $s = $request->input('s');
        if (empty($s)) return redirect('/');


        $user = Auth::user();

        $posts = Post::leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->where(function($query) use ($user) {

                $query->where('users.private', 0)->orWhere(function($query) use ($user){
                    $query->whereExists(function ($query) use($user){
                        $query->select(DB::raw(1))
                            ->from('user_following')
                            ->whereRaw('user_following.following_user_id = users.id and user_following.follower_user_id = '.$user->id);
                    });
                })->orWhere(function($query) use ($user){
                    $query->where('users.private', 1)->where('users.id', $user->id);
                });

            })->where('posts.content', 'like', '%'.$s.'%')->where('posts.group_id', 0)
            ->groupBy('posts.id')->select('posts.*')->orderBy('posts.id', 'DESC')->get();

        $comment_count = 2;

       $users = User::where('name', 'like', '%'.$s.'%')->orWhere('username', 'like', '%'.$s.'%')
       ->orWhere('skill', 'like', '%'.$s.'%')->orWhere('skill2', 'like', '%'.$s.'%')->orWhere('skill3', 'like', '%'.$s.'%')->orderBy('rate', 'DESC')->get();


            
        return view('search', compact('users', 'posts', 'user', 'comment_count'));

    }


    





}
