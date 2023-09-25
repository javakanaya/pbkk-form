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
            'email' => 'required|email:rfc',
            'value' => 'required|numeric|between:2.50,99.90',
            'address' => 'required',
            'image' => 'required|max:2048|mimes:jpg,jpeg,png',
        ]);

        $request->image->storeAs('images', $request->image->getClientOriginalName(), 'public');

        $results = [
            'name' => $request->name,
            'email' => $request->email,
            'value' => $request->value,
            'address' => $request->address,
            'image' => $request->image->getClientOriginalName(),
        ];

        return redirect('/')->with(['results' => $results, 'status' => 'form submitted']);
    }
}