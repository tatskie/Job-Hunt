<?php

namespace App\Http\Controllers;

use Session;
use App\Work;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorksController extends Controller
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
        $works = Auth::user()->works;

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        return view('works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'company' => 'required|max:255',
            'position' => 'required|max:255',
            'address' => 'required|max:255',
            'discription' => 'required|max:1021',
            'date_start' => 'required|date_format:Y',
            'date_end' => 'date_format:Y',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        if ($request->input('date_start') > $request->input('date_end')) {
           return redirect()->back()
                    ->with('flash_message',
                     'Year end cannot be less than year start');
        }

        $data['user_id'] = Auth::user()->id;

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }
        
        Work::create($data);

        Session::flash('message', 'Work added!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Work added successfully!');
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
        $work = Work::findOrFail($id);

        return view('backEnd.works.show', compact('work'));
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
        $work = Work::findOrFail($id);

        return view('backEnd.works.edit', compact('work'));
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
        
        $work = Work::findOrFail($id);

        $rules = [
            'company' => 'required|max:255',
            'position' => 'required|max:255',
            'address' => 'required|max:255',
            'discription' => 'required|max:1021',
            'date_start' => 'required|date_format:Y',
            'date_end' => 'date_format:Y',
            'current' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->has('company')) {
            $work['company'] = $request->input('company');
        }

        if ($request->has('position')) {
            $work['position'] = $request->input('position');
        }

        if ($request->has('address')) {
            $work['address'] = $request->input('address');
        }

        if ($request->has('discription')) {
            $work['discription'] = $request->input('discription');
        }

        if ($request->has('date_start')) {
            $work['date_start'] = $request->input('date_start');
        }

        if ($request->has('date_end')) {
            $work['date_end'] = $request->input('date_end');
        }

        if ($work->current == 1) {
            $work['date_end'] = null;
        }

        if ($request->has('current')) {

            $work['current'] = $request->input('current');
        }

        if ($request->input('date_start') < $request->input('date_end')) {
           return redirect()->back()
                    ->with('flash_message',
                     'Year end cannot be less than year start');
        }

        $work['user_id'] = Auth::user()->id;

        if (!$work->isDirty()) {
            return redirect()->back()
            ->with('flash_message',
             'You need to specify a different value to update.');
        }

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        $work->update($request->all());

        Session::flash('message', 'Work updated!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Work updated successfully!');
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
        $work = Work::findOrFail($id);

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        $work->delete();

        Session::flash('message', 'Work deleted!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Work deleted successfully!');
    }

}
