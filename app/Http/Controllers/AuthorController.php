<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = User::where('role', 'Author')->paginate(5);
        return view('backend.role.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        $author_data = [
            'role' => 'User',
        ];

        User::whereId($id)->update($author_data);

        return redirect('/author')->with('success', 'Role Berhasil Diubah !');
    }

    public function edits($id)
    {
        $authors_data = [
            'role' => 'Seller',
        ];

        User::whereId($id)->update($authors_data);

        return redirect('/author')->with('success', 'Role Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = User::findorfail($id);
        $authors->delete();
        Storage::delete($authors->avatar);

        return redirect('/author')->with('success', 'Author Berhasil Dihapus !');
    }

    public function search(Request $request)
    {
        $authors = User::where('role', 'Author')->where('name', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.role.author.index', compact('authors'));
    }
}
