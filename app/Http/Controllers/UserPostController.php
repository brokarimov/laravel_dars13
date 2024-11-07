<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->paginate(5);
        return view('pages.user-post', ['models'=>$posts]);
    }
}
