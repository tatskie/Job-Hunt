<?php

namespace App\Http\Controllers\User;

use App\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {

        $user = User::findOrFail($id);
        return view('resume.profile')->with('user', $user); 
    }

    public function resume($id) {

        $user = User::findOrFail($id);
        return view('resume.resume')->with('user', $user); 
    }

    public function update_avatar(Request $request){
        $this->validate($request, [
          'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if (Auth::user()->avatar != 'default.jpg') {
            Storage::delete(Auth::user()->avatar);
        }
     
        $filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('/user/'), $filename);
        
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();


        echo 'Image Uploaded Successfully';
        return back()
            ->with('success','images Has been You uploaded successfully.');

    }

    public function updateProfile(Request $request){
        $user = Auth::user();

        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_initial' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'contact' => 'required|max:161',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'string|min:6|confirmed',
        ];

        $this->validate($request, $rules);

        if ($request->has('first_name')) {
            $user['first_name'] = $request->input('first_name');
        }

        if ($request->has('last_name')) {
            $user['last_name'] = $request->input('last_name');
        }

        if ($request->has('middle_initial')) {
            $user['middle_initial'] = $request->input('middle_initial');
        }

        if ($request->has('date_of_birth')) {
            $user['date_of_birth'] = $request->input('date_of_birth');
        }

        if ($request->has('contact')) {
            $user['contact'] = $request->input('contact');
        }

        if ($request->has('address')) {
            $user['address'] = $request->input('address');
        }

        if ($request->has('city')) {
            $user['city'] = $request->input('city');
        }

        if ($request->has('country')) {
            $user['country'] = $request->input('country');
        }

        if ($request->has('gender')) {
            $user['gender'] = $request->input('gender');
        }

        if ($request->has('email')) {
            $user['email'] = $request->input('email');
        }

        if ($request->has('password')) {
            $user['password'] = bcrypt($request->password_confirmation);
        }

        if (!$user->isDirty()) {
            return redirect()->back()
            ->with('flash_message',
             'You need to specify a different value to update.');
        }

        $user->save();

        return redirect()->back()->with('flash_message',
             'User updated successfully!');
    }
}
