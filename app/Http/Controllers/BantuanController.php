<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function berbelanja()
    {
        return view('frontend.bantuan.berbelanja');
    }
    
    public function berjualan()
    {
        return view('frontend.bantuan.berjualan');
    }
    
    public function menambahpostingan()
    {
        return view('frontend.bantuan.menambahpostingan');
    }
    
    public function mengajukanpertanyaan()
    {
        return view('frontend.bantuan.mengajukanpertanyaan');
    }
}
