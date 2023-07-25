<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function profile(){
        $user = Auth::user();

        return view('dashboard.profile', compact('user')); //convention for accessing files in folders. compact is a method used to display the array of values in $user
    }

    

    public function update_profile(Request $request){
        $user = Auth::user();
        $user-> update($request -> only(['name', 'email']));
        return redirect()-> route('dashboard.profile') -> with('success', 'updated successfully');

    }
};
