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
            'Name' => $request->name,
            'Email' => $request->email,
            'Value' => $request->value,
            'Address' => $request->address,
        ];

        return redirect('/')->with(['results' => $results, 'image' => $request->image->getClientOriginalName()]);
    }
}