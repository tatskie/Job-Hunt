<?php

namespace App\Http\Controllers;

use Session;
use App\Skill;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SkillsController extends Controller
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
        $skills = Auth::user()->skills;

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }
        
        return view('skills.index', compact('skills'));
    }

    public function addSkill(Request $request){
        $rules = array(
            'skill' => 'required',
        );

        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails()) 
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        else
        {
            $data = $request->all();
            $data['skill'] = $request->input('skill');
            $data['user_id'] = Auth::user()->id;
            $skill = Skill::create($data);

            return response()->json($skill);
        }
    }
    public function editSkill(Request $request){
        $skill = Skill::find($request->id);
        $skill['skill'] = $request->skill;
        $skill['user_id'] = Auth::user()->id;
        $skill->save();
        return response()->json($skill);
    }

    public function deleteSkill(Request $request){
        $post = Skill::find($request->id)->delete();
        return response()->json($post);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        /*
        if ($request->ajax()) {
            $skill = new Skill();
            $skill['user_id'] = $request->user_id;
            $skill['skill'] = $request->skill;
            if ($skill->save()) {
                return response()->json($skill);
            }
        }
        */
        $rules = [
            'skill' => 'required|max:50',
            'rating' => 'required'
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        $data['skill'] = $request->input('skill');
        $data['user_id'] = Auth::user()->id;

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        $skill = Skill::create($data);

        $rating = new Rating;
        $rating->user_id = \Auth::id();
        $rating->rating = $request->input('rating');
        $skill->ratings()->save($rating);

        Session::flash('message', 'Skill added!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Skill added successfully!');
        
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
        $skill = Skill::findOrFail($id);

        return view('backEnd.skills.show', compact('skill'));
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
        $skill = Skill::findOrFail($id);

        return view('backEnd.skills.edit', compact('skill'));
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
        
        $skill = Skill::findOrFail($id);

        $rules = [
            'skill' => 'required|max:50',
        ];

        $this->validate($request, $rules);

        if ($request->has('skill')) {
            $skill['skill'] = $request->input('skill');
        }

        $skill['user_id'] = Auth::user()->id;

        if (!$skill->isDirty()) {
            return redirect()->back()
            ->with('flash_message',
             'You need to specify a different value to update.');
        }   

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        $skill->update($skill);

        Session::flash('message', 'Skill updated!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Skill updated successfully!');
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
        /*
        if ($request->ajax()) {
            Skill::destroy($id);
            return response(['id'=>$id]);
        }
        */
        $skill = Skill::findOrFail($id);

        if (Auth::user()->verified == true) {
            return redirect()->back();
        }

        $skill->delete();

        Session::flash('message', 'Skill deleted!');
        Session::flash('status', 'success');

        return redirect()->back()->with('flash_message',
             'Work deleted successfully!');
        
    }

}
