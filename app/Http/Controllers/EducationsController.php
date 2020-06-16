<?php

namespace App\Http\Controllers;

use Session;
use App\Education;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EducationsController extends Controller
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
        $educations = Auth::user()->educations;

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }
        
        return view('educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.educations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Education $education, Request $request)
    {
        $rules = [
            'school' => 'required|max:255',
            'course' => 'max:255',
            'address' => 'max:255',
            'discription' => 'max:1021',
            'year_start' => 'required|date_format:Y',
            'year_end' => 'date_format:Y',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        if ($request->input('year_start') > $request->input('year_end')) {
           return redirect()->back()
                    ->with('flash_message',
                     'Year end cannot be less than year start');
        }

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        $data['user_id'] = Auth::user()->id;

        Education::create($data);

        Session::flash('message', 'Education added!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Education added successfully!');
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
        $education = Education::findOrFail($id);

        return view('backEnd.educations.show', compact('education'));
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
        $education = Education::findOrFail($id);

        return view('backEnd.educations.edit', compact('education'));
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
        
        $education = Education::findOrFail($id);

        $rules = [
            'school' => 'required|max:255',
            'course' => 'max:255',
            'address' => 'max:255',
            'discription' => 'max:1021',
            'year_start' => 'required|date_format:Y',
            'year_end' => 'date_format:Y',
        ];

        $this->validate($request, $rules);

        if ($request->has('school')) {
            $education['school'] = $request->input('school');
        }

        if ($request->has('course')) {
            $education['course'] = $request->input('course');
        }

        if ($request->has('address')) {
            $education['address'] = $request->input('address');
        }

        if ($request->has('discription')) {
            $education['discription'] = $request->input('discription');
        }

        if ($request->has('year_start')) {
            $education['year_start'] = $request->input('year_start');
        }

        if ($request->has('year_end')) {
            $education['year_end'] = $request->input('year_end');
        }

        if ($request->has('graduated')) {
            $education['graduated'] = $request->input('graduated');
        }
        if ($request->input('year_start') > $request->input('year_end')) {
           return redirect()->back()
                    ->with('flash_message',
                     'Year end cannot be less than year start');
        }

        $education['user_id'] = Auth::user()->id;

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        if (!$education->isDirty()) {
            return redirect()->back()
            ->with('flash_message',
             'You need to specify a different value to update.');
        }
        $education->update($request->all());

        Session::flash('message', 'Education updated!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Education updated successfully!');
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
        $education = Education::findOrFail($id);

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        $education->delete();

        Session::flash('message', 'Education deleted!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Education deleted successfully!');
    }

}
