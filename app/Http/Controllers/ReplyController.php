<?php

namespace App\Http\Controllers;

use App\Post;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RepliedToThread;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'subject' => 'required|max:255',
            'cover_letter' => 'required|max:8000',
            // 'resume' => 'required|max:10000|mimes:doc,docx',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        
        if (empty(auth()->user()->email)) {
            return redirect()->back();
        }
        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        // $filename = Auth::id().'_'.time().'.'.$request->resume->getClientOriginalExtension();
        // $request->resume->move(public_path('/user/'), $filename);

        $data['subject'] = $request->input('subject');
        $data['cover_letter'] = $request->input('cover_letter');
        // $data['resume'] = $filename;
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $request->input('post_id');

        $reply = Reply::create($data);

        $post = $reply->post;
        $post->user->notify(new RepliedToThread($post));

        return redirect()->back()->with('flash_message',
             'Apply job sent successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
    }
    
}
