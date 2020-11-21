<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return view
     */
    public function index(){
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }
   


    /**
     * @param Request $request
     * 
     * @return JsonResource
     */
    public function search(Request $request):JsonResponse
    {
        $q =  $request->input('q');
 
        $posts = Post::where('title', 'like' , '%'.$q.'%')->get();

        return response()->json([
            'post' => $posts
        ]);
    }
}
