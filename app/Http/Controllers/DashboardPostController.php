<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DashboardPost;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.posts.index', [
            'posts' => post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:3072',
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            # code...
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New Post Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DashboardPost  $dashboardPost
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
        return view('dashboard.posts.view', [
            'post' => $post 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DashboardPost  $dashboardPost
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DashboardPost  $dashboardPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:3072',
            'body' => 'required',
        ];
        
        

        if ($request->slug != $post->slug) {
            # code...
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            # code...
            if ($request->oldImage) {
                # code...
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DashboardPost  $dashboardPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //menghapus data
        if ($post->image) {
            # code...
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', ' Post Has Been Deleted');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
