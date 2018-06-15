<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PagesController extends Controller
{
    public function home(){
    	$posts = Post::orderBy('created_at', 'desc')->paginate(4);

        return view('pages.home', compact('posts'));

    }
}
