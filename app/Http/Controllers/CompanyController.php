<?php

namespace App\Http\Controllers;

use Session;
use App\Company;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
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
        $company = Auth::user()->company;
        
        if (Auth::user()->verified == false) {
            return redirect()->back();
        }

        return view('company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $company = Auth::user()->company;
        $rules = [
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'country' => 'required|max:255',
            'postal' => 'required|max:255',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        if (count($company) >= 1) {
            return redirect()->back()->with('flash_message',
             'Cannot add more Company!');
        }

        if (Auth::user()->verified == false) {
            return redirect()->back();
        }

        $data['user_id'] = Auth::user()->id;
        Company::create($data);

        Session::flash('message', 'Company added!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Company added successfully!');
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
        $company = Company::findOrFail($id);

        return view('backEnd.company.show', compact('company'));
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
        $company = Company::findOrFail($id);

        return view('backEnd.company.edit', compact('company'));
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
        
        $company = Company::findOrFail($id);

        $rules = [
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'country' => 'required|max:255',
            'postal' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        if ($request->has('name')) {
            $company['name'] = $request->input('name');
        }

        if ($request->has('city')) {
            $company['city'] = $request->input('city');
        }

        if ($request->has('address')) {
            $company['address'] = $request->input('address');
        }

        if ($request->has('country')) {
            $company['country'] = $request->input('country');
        }

        if ($request->has('postal')) {
            $company['postal'] = $request->input('postal');
        }

        if (Auth::user()->verified == false) {
            return redirect()->back();
        }

        $company['user_id'] = Auth::user()->id;

        if (!$company->isDirty()) {
            return redirect()->back()
            ->with('flash_message',
             'You need to specify a different value to update.');
        }

        
        $company->save();

        Session::flash('message', 'Company updated!');
        Session::flash('status', 'success');

        return redirect('company')->with('flash_message',
             'Company updated successfully!');
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
        $company = Company::findOrFail($id);

        $company->delete();

        Session::flash('message', 'Company deleted!');
        Session::flash('status', 'success');

        return redirect('company');
    }

}
