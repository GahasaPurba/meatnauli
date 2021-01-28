<?php

namespace App\Http\Controllers;

use App\Item;
use App\Question;
use App\QnaCategory;
use Illuminate\Http\Request;

class QnaController extends Controller
{
    public function qna(Question $questions)
    {
        $questions = Question::orderBy('created_at', 'desc')->paginate(8);
        $data = Question::orderBy('created_at', 'desc')->limit(4)->get();
        $data2 = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = QnaCategory::all();
        return view('frontend.qna.index', compact('questions', 'data', 'data2', 'categories'));
    }

    public function singleqna(Question $questions, $slug)
    {
        $data = Question::where('slug', $slug)->get();
        $questions = Question::orderBy('created_at', 'desc')->limit(4)->get();
        $items = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = QnaCategory::all();
        return view('frontend.qna.single', compact('data', 'questions', 'items', 'categories'));
    }

    public function category(QnaCategory $category)
    {
        $questions = $category->question()->paginate(8);
        $data = Question::orderBy('created_at', 'desc')->limit(4)->get();
        $data2 = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = QnaCategory::all();
        return view('frontend.qna.index', compact('questions', 'data', 'data2', 'categories'));
    }

    public function search(Request $request)
    {
        $questions = Question::where('question', $request->search)->orWhere('question', 'like', '%' . $request->search . '%')->paginate(8);
        $data = Question::orderBy('created_at', 'desc')->limit(4)->get();
        $data2 = Item::orderBy('created_at', 'desc')->limit(3)->get();
        $categories = QnaCategory::all();
        return view('frontend.qna.index', compact('questions', 'data', 'data2', 'categories'));
    }
}
