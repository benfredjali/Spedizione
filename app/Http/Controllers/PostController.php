<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = new Post();
        $data->title = $request->get('title');
        $data->save();
        return response()->json('Successfully added');

    }

    public function get(Request $request)
    {
        $data = Post::all();
        return response()->json($data);
    }
}
