<?php

namespace App\Http\Controllers;

use Session;
use App\Post;
use App\Notify;
use App\Company;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(20);

        return view('backEnd.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|unique:posts|max:255',
            'job' => 'max:8000',
            'salary' => 'max:255',
            'contact' => 'max:1021',
            'city' => 'max:255',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        
        if (empty(auth()->user()->email)) {
            return redirect()->back();
        }
        if (Auth::user()->verified == false) {
            return redirect()->back();
        }
        $company = Company::where('user_id', '=', Auth::user()->id)->first();

        if (empty($company)) {
            return redirect()->back()->with('flash_message',
             'Please add your company to post job!');
        }
        else{
            $data['company_id'] = $company->id;
        }
        $data['title'] = $request->input('title');
        $data['slug'] = str_slug($request->input('title'));
        $data['category_id'] = $request->input('category_id');
        $data['user_id'] = Auth::user()->id;
        

        Post::create($data);

        Session::flash('message', 'Post added!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Post job added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('backEnd.posts.show', compact('post'));
    }

    public function slug($slug, Request $request)
    {   

        $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.index', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('backEnd.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $post = Post::findOrFail($id);

        $rules = [
            'title' => 'required|max:255',
            'job' => 'max:4000',
            'salary' => 'max:255',
            'contact' => 'max:1021',
            'city' => 'max:255',
        ];

        $this->validate($request, $rules);

        if ($request->has('title')) {
            $post['title'] = $request->input('title');
        }

        if ($request->has('job')) {
            $post['job'] = $request->input('job');
        }

        if ($request->has('salary')) {
            $post['salary'] = $request->input('salary');
        }

        if ($request->has('contact')) {
            $post['contact'] = $request->input('contact');
        }

        if ($request->has('city')) {
            $post['city'] = $request->input('city');
        }

        if ($request->has('category_id')) {
            $post['category_id'] = $request->input('category_id');
        }

        if (Auth::user()->verified == false) {
            return redirect()->back();
        }

        if (Auth::user()->id != $post->user_id) {
            return redirect()->back()->with('flash_message',
             'You are not allowed to update this post!');
        }

        if (!$post->isDirty()) {
            return redirect()->back()
            ->with('flash_message',
             'You need to specify a different value to update.');
        }

        $post->save();

        Session::flash('message', 'Post updated!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Post job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        Session::flash('message', 'Post deleted!');
        Session::flash('status', 'success');
        if (auth()->user()->admin == 'true') {
            return redirect()->back()->with('flash_message',
             'Post job deleted successfully!');
        }
        return redirect('home')->with('flash_message',
             'Post job deleted successfully!');
    }

}
