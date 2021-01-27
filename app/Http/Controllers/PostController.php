<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.post.index', compact('posts'));


        // $posts = Post::with('category')->get();
        // $posts = json_decode(json_encode($posts));
        // echo "<pre>"; print_r($posts); die;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact(['categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        
        // Validation
        $this->validate($request , [
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category_id' => 'required',
        ]);


        $post = Post::create([
            'title' => $request->title,
            'image' => $request->image,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        $post->tags()->attach($request->tags);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            $post->save();
        }

        Session::flash('success', 'Post created successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validation
        $this->validate($request , [
            'title' => "required|unique:posts,title, $post->id",
            'image' => 'sometimes|image',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        $post->tags()->sync($request->tags);

        if ($request->hasFile('image')) {
            $image = $request->image;
            unlink(public_path($post->image));
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
            
        }
        // if (file_exists($post->image)) {
        //     unlink($post->image);
        // }
        $post->save();
        
        Session::flash('success', 'Post updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            if (file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }
            $post->delete();
            Session::flash('success', 'Post deleted successfully');
        }
        return redirect()->back();
    }
}
