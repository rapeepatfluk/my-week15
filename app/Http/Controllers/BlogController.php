<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::orderByDesc('id')->where('status',1)->paginate(5);
        return view('index',compact('blog'));
    }
    public function detail($id)
    {
        $blog = Blog::find($id);
        return view('detail',compact('blog'));
    }
}
