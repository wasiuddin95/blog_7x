<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class FrontEndController extends Controller
{
    public function home()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();
        $firstposts2 = $posts->splice(0,2);
        $middleposts = $posts->splice(0,1);
        $lastposts = $posts->splice(0);

        $footerPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        $firstFooterPosts = $footerPosts->splice(0,1);
        $firstFooterPosts2 = $footerPosts->splice(0,2);
        $lastFooterPost = $footerPosts->splice(0,1);

        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact(['posts', 'recentPosts', 'firstposts2', 'middleposts', 'lastposts', 'footerPosts', 'firstFooterPosts', 'firstFooterPosts2', 'lastFooterPost'])); 
    }
    
    public function about()
    {
        return view('website.about');
    }
    
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $posts = Post::where('category_id', $category->id)->paginate(9);

            return view('website.category', compact(['category', 'posts']));
        }else {
            return redirect()->route('website');
        }
    }
    
    public function contact()
    {
        return view('website.contact');
    }
    
    public function post($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();

        // More Related Post
        $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        // return $relatedPosts; 
        $firstRelatedPosts = $relatedPosts->splice(0,1);
        $firstRelatedPosts2 = $relatedPosts->splice(0,2);
        $lastRelatedPost = $relatedPosts->splice(0,1);

        $categories = Category::all();
        $tags = Tag::all();
        
        if ($post) {
            return view('website.post', compact(['post', 'posts', 'categories', 'tags', 'firstRelatedPosts', 'firstRelatedPosts2', 'lastRelatedPost']));
        }else {
            return redirect('/');
        }
    }
}
