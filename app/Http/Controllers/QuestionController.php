<?php

namespace App\Http\Controllers;

use App\Question;
use App\QnaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Administrator') {
            $questions = Question::paginate(5);
        } else if (Auth::user()->role == 'Author' || Auth::user()->role == 'Seller' || Auth::user()->role == 'User') {
            $questions = Question::where('user_id', Auth::user()->id)->paginate(5);
        }
        return view('backend.qna.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = QnaCategory::all();
        return view('backend.qna.question.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'qna_category_id' => 'required',
            'question' => 'required',
        ];

        $messages = [
            'qna_category_id.required' => 'Pilih Salah Satu Kategori Pertanyaan',
            'question.required' => 'Judul Pertanyaan Tidak Boleh Kosong',
        ];

        $request->validate($rules, $messages);

        Question::create([
            'qna_category_id' => $request->qna_category_id,
            'user_id' => Auth::id(),
            'question' => $request->question,
            'slug' => Str::slug($request->question),
        ]);

        return redirect('/question')->with('success', 'Pertanyaan Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = QnaCategory::all();
        $questions = Question::findorfail($id);
        return view('backend.qna.question.edit', compact('questions', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'qna_category_id' => 'required',
            'question' => 'required',
        ];

        $messages = [
            'qna_category_id.required' => 'Pilih Salah Satu Kategori Pertanyaan',
            'question.required' => 'Judul Pertanyaan Tidak Boleh Kosong',
        ];

        $request->validate($rules, $messages);

        $questions = Question::findorfail($id);

        $question_data = [
            'qna_category_id' => $request->qna_category_id,
            'question' => $request->question,
            'slug' => Str::slug($request->question),
        ];

        $questions->update($question_data);

        return redirect('/question')->with('success', 'Pertanyaan Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = Question::findorfail($id);
        $questions->delete();

        if (Auth::user()->role == 'Administrator') {
            return redirect('/question')->with('success', 'Pertanyaan Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
        } else if (Auth::user()->role == 'Author' || Auth::user()->role == 'Seller' || Auth::user()->role == 'User') {
            return redirect('/question')->with('success', 'Pertanyaan Berhasil Dihapus !');
        }
    }

    public function search(Request $request)
    {
        $questions = Question::where('question', $request->search)->orWhere('question', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.qna.question.index', compact('questions'));
    }

    public function trash()
    {
        $questions = Question::onlyTrashed()->paginate(5);
        return view('backend.qna.question.trash', compact('questions'));
    }

    public function restore($id)
    {
        $questions = Question::withTrashed()->where('id', $id)->first();
        $questions->restore();

        return redirect()->back()->with('success', 'Pertanyaan Berhasil Direstore !');
    }

    public function kill($id)
    {
        $questions = Question::withTrashed()->where('id', $id)->first();
        $questions->forceDelete();

        return redirect()->back()->with('success', 'Pertanyaan Berhasil Dihapus Permanen !');
    }
}
