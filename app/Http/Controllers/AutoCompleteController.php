<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AutoCompleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function search(Request $request){

        $query = $request->term;
        $items = Post::where('title', 'LIKE', '%'.$query.'%')->orWhere('city', 'LIKE', '%'.$query.'%')->get();
        // return $item;
        if (count($items) == 0) {
           $searchResult[] = 'No item found.';
        }else
        {
            foreach ($items as $key => $value) {
                $searchResult[] = $value->title;
            }
        }

        return $searchResult;
        
	}

    public function searchBox(Request $request){

        if($request->ajax())
        {

            $output = "";
            $posts = Post::where('title','LIKE','%'.$request->input('searchItem').'%')->take(5)->get();

            if($posts)
            {
                foreach ($posts as $key => $post) 
                {
                    $date = $post->updated_at->diffForHumans();
                    $address = $post->company->address;
                    $name = $post->company->name;
                    $output.= '<tr scope="row">'.'<th class="row">'.'<a href="'.url('posts/'.$post->slug).' ">'.ucwords($post->title).'</a>'.'</th>'.
                         '<td>'.$address.'</td>'.
                         '<td>'.$name.'</td>'.
                         '<td>'.$date.'</td>'.
                         '</tr>';
                }
                return Response($output);
            }
            
        }
        // $query = $request->input('searchItem');
        // $posts = Post::where('job','LIKE','%'.$query.'%')->get();
        // if(count($posts) == 0){
        //     return view('posts.search')->with('posts', $posts);
        // }
        // else {
        //     return view('posts.search')->with('posts', $posts)->with('flash_message',
        //      'No Details found. Try to search again !');
        // } 
    }

    public function jobResult(Request $request){
        $query = $request->input('searchItem');
        $posts = Post::where('job','LIKE','%'.$query.'%')->get();
        if(count($posts) == 0){
             return view('posts.search')->with('posts', $posts);
         }
         else {
             return view('posts.search')->with('posts', $posts)->with('flash_message',
              'No Details found. Try to search again !');
         } 
    }

    public function searchJob(Request $request){

        // Gets the query string from our form submission 
          $query = $request->input('search');
          // Returns an array of articles that have the query string located somewhere within 
          // our articles titles. Paginates them so we can break up lots of search results.
          $posts = Post::where('title', 'LIKE', '%' . $query . '%')->paginate(10);
              
          // returns a view and passes the view the list of articles and the original query.
          return view('page.search', compact('posts', 'query'));  
    }

     public function printSearch(Request $request){

        
          $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
              
          // returns a view and passes the view the list of articles and the original query.
          return view('page.search', compact('posts'));  
    }
}
