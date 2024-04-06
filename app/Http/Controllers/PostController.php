<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest as PostStorePostRequest;
use App\Models\Post;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Comment;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function feature()
    {
        $featuredPosts = Post::where('is_featured', 1)->get();
        foreach ($featuredPosts as $featuredPost) {
            $featuredPost->formatted_created_at = Carbon::parse($featuredPost->created_at)->isoFormat('MMM D, YYYY');
        }
        return view('feature', ['featuredPosts' => $featuredPosts]);
    }
    public function home()
    {
        $post = Post::find(3);
        $featuredPosts = Post::where('is_featured', 1)->take(2)->get();
        foreach ($featuredPosts as $featuredPost) {
            $featuredPost->formatted_created_at = Carbon::parse($featuredPost->created_at)->isoFormat('MMM D, YYYY');
        }

        return view("welcome", ['post' => $post, 'featuredPosts' => $featuredPosts]);
    }
    public function index()
    {
        $users = User::all();

        $posts = Post::all();
        foreach ($posts as $post) {
            $post->formatted_created_at = Carbon::parse($post->created_at)->isoFormat('MMM D, YYYY');
        }

        $comments = Comment::all();
        return view("posts.index", ['posts' => $posts, 'users' => $users, "comments" => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // return $request;
        // return Auth::user()->id;

        $request['is_featured'] = $request->is_featured ?? 0;
        $new = $request->all();
        $new['user_id'] = Auth::user()->id;
        $new['category_id'] = 6;

        // dd($new);
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $new['photo'] = $photoPath;
        }

        Post::create($new);
        return redirect()->route('posts');
    }
    // public function store(Request $request)
    // {
    //     return "hello store";
    // }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->formatted_created_at = Carbon::parse($post->created_at)->isoFormat('MMM D, YYYY');

        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return  view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {;
        $request['is_featured'] = $request->is_featured ?? 0;
        $new = $request->all();
        $new['user_id'] = Auth::user()->id;
        // $new['category_id'] = $request->category_id;
        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($post->photo);
            $photoPath = $request->file('photo')->store('photos', 'public');
            $new['photo'] = $photoPath;
        };

        $post->update($new);
        // return $post;
        return redirect()->route('posts')->with('message', "post edit success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts');
    }
}
