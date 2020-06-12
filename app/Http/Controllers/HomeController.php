<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use App\Question;
use App\QnaCategory;
use App\Item;
use App\SouvenirCategory;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $administrators = User::where('role', 'Administrator')->count();
        $authors = User::where('role', 'Author')->count();
        $sellers = User::where('role', 'Seller')->count();
        $users = User::where('role', 'User')->count();
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $jumlahpost = Post::count();
        $questions = Question::orderBy('created_at', 'desc')->limit(5)->get();
        $jumlahquestion = Question::count();
        $items = Item::orderBy('created_at', 'desc')->limit(5)->get();
        $jumlahitem = Item::count();
        return view('backend', compact('administrators', 'authors', 'sellers', 'users', 'posts', 'jumlahpost', 'questions', 'jumlahquestion', 'items', 'jumlahitem'));
    }

    public function editpost($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::findorfail($id);
        return view('backend.blog.post.edit', compact('posts', 'categories', 'tags'));
    }

    public function destroypost($id)
    {
        $posts = Post::findorfail($id);
        $posts->delete();

        return redirect('/home')->with('success', 'Postingan Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
    }

    public function editquestion($id)
    {
        $categories = QnaCategory::all();
        $questions = Question::findorfail($id);
        return view('backend.qna.question.edit', compact('questions', 'categories'));
    }

    public function destroyquestion($id)
    {
        $questions = Question::findorfail($id);
        $questions->delete();

        return redirect('/home')->with('success', 'Diskusi Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
    }

    public function edititem($id)
    {
        $categories = SouvenirCategory::all();
        $items = Item::findorfail($id);
        return view('backend.souvenir.item.edit', compact('items', 'categories'));
    }

    public function destroyitem($id)
    {
        $items = Item::findorfail($id);
        $items->delete();

        return redirect('/home')->with('success', 'Item Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
    }
}
