<?php

namespace App\Http\Controllers;

use App\SouvenirCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SouvenirCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SouvenirCategory::paginate(5);
        return view('backend.souvenir.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.souvenir.category.create');
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
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Nama Kategori Tidak Boleh Kosong',
            'name.min' => 'Nama Kategori Minimal 3 Karakter'
        ];

        $request->validate($rules, $messages);

        SouvenirCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect('/souvenircategory')->with('success', 'Kategori Berhasil Ditambahkan !');
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
        $categories = SouvenirCategory::findorfail($id);
        return view('backend.souvenir.category.edit', compact('categories'));
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
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Nama Kategori Tidak Boleh Kosong',
            'name.min' => 'Nama Kategori Minimal 3 Karakter'
        ];

        $request->validate($rules, $messages);

        $category_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        SouvenirCategory::whereId($id)->update($category_data);

        return redirect('/souvenircategory')->with('success', 'Kategori Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = SouvenirCategory::findorfail($id);
        $categories->delete();

        return redirect('/souvenircategory')->with('success', 'Kategori Berhasil Dihapus !');
    }

    public function search(Request $request)
    {
        $categories = SouvenirCategory::where('name', $request->search)->orWhere('name', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.souvenir.category.index', compact('categories'));
    }
}
