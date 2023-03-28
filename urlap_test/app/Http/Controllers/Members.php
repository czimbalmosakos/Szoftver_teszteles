<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Members extends Controller
{
    public function index()
    {
        return view('Members');
    }
}
