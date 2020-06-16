<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
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
        $job = Auth::user()->jobs;
        $rules = [
            'discription' => 'max:1020',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        if (count($job) >= 1) {
            return redirect()->back()->with('flash_message',
             'Cannot add more Job Category!');
        }
        $data['discription'] = $request->input('discription');
        $data['category_id'] = $request->input('category_id');
        $data['user_id'] = Auth::user()->id;

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }
        
        Job::create($data);

        return redirect()->back()->with('flash_message',
             'Job category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
         
        $rules = [
            'discription' => 'max:1020',
        ];

        $this->validate($request, $rules);

        if ($request->has('discription')) {
            $job['discription'] = $request->input('discription');
        }
        if ($request->has('discription')) {
            $job['category_id'] = $request->input('category_id');
        }
        $job['user_id'] = Auth::user()->id;

        if (!$job->isDirty()) {
            return redirect()->back()
            ->with('flash_message',
             'You need to specify a different value to update.');
        }

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        $job->save();

        return redirect()->back()->with('flash_message',
             'Job category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {   
        if (Auth::user()->verified == true) {
            return redirect()->back();
        }
        $job->delete();


        return redirect()->back()->with('flash_message',
             'Job category deleted successfully!');
    }
}
