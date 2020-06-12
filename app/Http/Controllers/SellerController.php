<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = User::where('role', 'Seller')->paginate(5);
        return view('backend.role.seller.index', compact('sellers'));
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
        $seller_data = [
            'role' => 'User',
        ];

        User::whereId($id)->update($seller_data);

        return redirect('/seller')->with('success', 'Role Berhasil Diubah !');
    }

    public function edits($id)
    {
        $sellers_data = [
            'role' => 'Author',
        ];

        User::whereId($id)->update($sellers_data);

        return redirect('/seller')->with('success', 'Role Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sellers = User::findorfail($id);
        $sellers->delete();
        Storage::delete($sellers->avatar);

        return redirect('/seller')->with('success', 'Seller Berhasil Dihapus !');
    }

    public function search(Request $request)
    {
        $sellers = User::where('role', 'Seller')->where('name', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.role.seller.index', compact('sellers'));
    }
}
