<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request){

        $validated_input = $request->validate([
            'name' => 'required | min: 3 | max: 20',
            'email' => 'required',
            'password' => 'required | min: 6'
        ]);

        try {
            User::create($request->all());
            return redirect('/login')->with('success', "Signup successful");
        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {
                // Duplicate entry error
                return redirect()->back()->withInput()->withErrors(['email' => 'The email address is already in use. Please choose a different email.']);
            } else {
                // Other database-related error
                return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred. Please try again later.']);
            }
        }
    }

   
};