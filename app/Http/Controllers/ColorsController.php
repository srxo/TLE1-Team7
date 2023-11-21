<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index()
    {
        return view('colors');
    }
}
