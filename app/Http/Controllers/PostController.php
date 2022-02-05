<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    

    public function index(){
        
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in '.$category->name;
        }
        
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by '.$author->name;
        }

        return view('post', [
            "title" => "All Post". $title,
            "active" => 'post',
            // "posts" => post::all(),
            "posts" => post::latest()->Filter(request(['search', 'category', 'author']))
                        ->paginate(7)->withQueryString(),
        ]);
    }

    public function show(post $post) {

        
    return view('artikel', [
        "title" => "single post",
        "active" => 'post',
        "post" => $post,
    ]);
    } 
}
