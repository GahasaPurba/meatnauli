<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Post $posts)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        $data = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $data2 = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.index', compact('posts', 'data', 'data2', 'categories', 'tags'));
    }

    public function singleblog(Post $posts, $slug)
    {
        $data = Post::where('slug', $slug)->get();
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $items = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.single', compact('data', 'posts', 'items', 'categories', 'tags'));
    }

    public function category(Category $category)
    {
        $posts = $category->post()->paginate(3);
        $data = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $data2 = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.index', compact('posts', 'data', 'data2', 'categories', 'tags'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->post()->paginate(3);
        $data = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $data2 = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.index', compact('posts', 'data', 'data2', 'categories', 'tags'));
    }

    public function search(Request $request)
    {
        $posts = Post::where('title', $request->search)->orWhere('title', 'like', '%' . $request->search . '%')->paginate(3);
        $data = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $data2 = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.index', compact('posts', 'data', 'data2', 'categories', 'tags'));
    }
}
