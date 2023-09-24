<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function index()
    {
        return view('form');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' =>'required|email:rfc',
            'value' =>'required|numeric|between:2.50,99.90',
            'alamat' =>'required',
            'images' =>'required|mimes:jpg,jpeg,png',
        ]);

        return redirect('/preview');
    }

    public function result(Request $request)
    {
        // ...
    }
}
