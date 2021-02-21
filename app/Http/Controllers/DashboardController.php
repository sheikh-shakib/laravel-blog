<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $postcount=Post::all()->count();
        $categorycount=Category::all()->count();
        $tagcount=Tag::all()->count();
        $usercount=User::all()->count();
        $posts=Post::latest()->take(10)->get();
            return view('admin.dashboard.index',compact('posts','postcount','categorycount','tagcount','usercount'));
        }
}
