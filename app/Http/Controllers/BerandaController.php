<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Post $posts)
    {
        $data = $posts->orderBy('created_at', 'desc')->limit(3)->get();
        return view('frontend', compact('data'));
    }
}
