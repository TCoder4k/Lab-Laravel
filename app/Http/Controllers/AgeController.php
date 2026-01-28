<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    /**
     * Show the age input form
     */
    public function showForm()
    {
        return view('age-input');
    }

    /**
     * Store the age in session
     */
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer|min:0|max:150'
        ]);

        $request->session()->put('age', $request->age);

        return redirect('/')->with('success', 'Age saved successfully!');
    }
}
