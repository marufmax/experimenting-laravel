<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Contact Page Controller
 */
class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        return response()->json($request->all());
    }
}
