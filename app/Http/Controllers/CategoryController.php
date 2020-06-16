<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'job' => 'max:200',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        $data['job'] = $request['job'];
        $data['user_id'] = Auth::user()->id;
        $category = Category::create($data);

    //Display a successful message upon save
        return redirect()->route('category.index')
            ->with('flash_message', 'Article,
             '. $category->job.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id); //Find post of id = $id

        return view ('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job'=>'required|max:100',
        ]);

        $category = Category::findOrFail($id);
        $category->job = $request->input('job');
        $category->save();

        return redirect()->route('category.show', 
            $category->id)->with('flash_message', 
            'Article, '. $category->job.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')
            ->with('flash_message',
             'Article successfully deleted');

    }
}
