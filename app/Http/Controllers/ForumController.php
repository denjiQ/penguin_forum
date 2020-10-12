<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use DB;
use Request;
use Session;
use Carbon\Carbon;

class ForumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = DB::table('posts')->orderBy('id', 'desc')->get();
        foreach($results as $key => $result){
            if($result->refers_to != null){
                $results->firstWhere('id', $result->refers_to)->refered_comments[] = $result;
                $results->pull($key);
            }
        }
//         ini_set('xdebug.var_display_max_children', -1);
// ini_set('xdebug.var_display_max_data', -1);
// ini_set('xdebug.var_display_max_depth', -1);
//         var_dump($results);
        // exit;
        return view('forum')->with([
            'results' => $results
        ]);
    }

    public function postComment($id = null){
        // Request::input('posted_comment'),
        if($id){
            if(empty(Request::input('posted_comment'))){
                return redirect('/');
            }
            DB::table('posts')->insert([
                'comment' => Request::input('posted_comment'),
                'refers_to' => $id,
                'session_id' => md5(Session::getId()),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }else{
            DB::table('posts')->insert([
                'comment' => Request::input('posted_comment'),
                'session_id' => md5(Session::getId()),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect('/');
    }

    public function getLike($id){
        if($id){
            DB::table('posts')->where('id', $id)->increment('like');
        }else{
            return redirect('/');
        }
        return redirect('/');
    }

}
