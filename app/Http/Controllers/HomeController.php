<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class HomeController extends Controller
{
    public function index()
    {
        $store = Store::first(); // ambil data toko

        return view('landing', compact('store'));
    }
}
