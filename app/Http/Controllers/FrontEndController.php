<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Contact;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home(){
        $posts=Post::with('category','user')->orderby('created_at','DESC')->take(5)->get();
        $firstposts  = $posts->splice(0,2);
        $middlepost  = $posts->splice(0,1);
        $lastposts  = $posts->splice(0,3);

        $footerposts=Post::with('category','user')->inRandomOrder()->limit(4)->get();
        $footerfirstpost  = $footerposts->splice(0,1);
        $footermiddleposts  = $footerposts->splice(0,2);
        $footerlastpost  = $footerposts->splice(0,3);

        $recentposts=Post::with('category','user')->orderby('created_at','DESC')->paginate(9);
        return view('web.index',compact('recentposts','firstposts','middlepost','lastposts','footerfirstpost','footermiddleposts','footerlastpost'));
    }

    public function post(Request $request){
        $slug=$request->slug;
        $post=Post::with('category','user')->where('slug',$slug)->first();
        $posts=Post::with('category','user')->inRandomOrder()->limit(3)->get();
        $tags=Tag::all();
        $categories=Category::all();
        $relatedposts=Post::where('category_id',$post->category_id)->inRandomOrder()->take(4)->get();
        $firstrelatedposts  = $relatedposts->splice(0,2);
        $middlerelatedpost  = $relatedposts->splice(0,1);
        $lastrelatedpost  = $relatedposts->splice(0,3);

        if ($post) {
            return view('web.post', compact('post','posts','categories','tags','firstrelatedposts','middlerelatedpost','lastrelatedpost'));
        }else {
            return redirect('/');
        }
        
    }

    public function about(){
        $user=User::first();
        return view('web.about' , compact('user'));
    }

    public function contact(){
        $setting=Setting::first();
        return view('web.contact',compact('setting'));
    }
    public function category($slug){
        $category=Category::where('slug',$slug)->first();
        if ($category) {
            $posts=Post::where('category_id',$category->id)->paginate(9);
            return view('web.category', compact('category','posts'));
        }else {
            return redirect()->route('index');
        }
    }
    public function tag($slug)
    {
        $tag=Tag::where('slug',$slug)->first();
        if ($tag) {
            $posts=$tag->posts()->orderby('created_at','DESC')->paginate(9);
            return view('web.tag', compact('posts','tag'));
        }
    }

    public function send_message(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required|max:100',
            'message'=>'required|min:100'
        ]);
        $create=Contact::create($request->all());
        if ($create) {
            return redirect()->back()->with('success','Message Sent Successfully');
        }
    }
}
