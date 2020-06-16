<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $posts = Post::orderBy('updated_at', 'desc')->paginate(20);
        $user = Auth::user();
        $categories = Category::all();
        return view('home')->with('user', $user)->with('categories', $categories)->with('posts', $posts);
    }

    public function employee()
    {
        $user = Auth::user();
        $categories = Category::all();

        if ($user->verified == true) {
            return redirect()->back();
        }
        return view('update')->with('user', $user)->with('categories', $categories);
    }

    public function employer()
    {
        $user = Auth::user();
        $categories = Category::all();
        if ($user->verified == false) {
            return redirect()->back();
        }
        return view('employer.index')->with('user', $user)->with('categories', $categories);
    }

    public function resume()
    {
        if (Auth::user()->verified == true) {
            return redirect()->back();
        }
        return view('resume.index');
    }

    public function profile()
    {
        $user = Auth::user();
        
        if ($user->verified == true) {
            return redirect()->back();
        }
        return view('profile')->with('user', $user);
    }

    public function error401()
    {
        return view('admin.errors.401');
    }
}
