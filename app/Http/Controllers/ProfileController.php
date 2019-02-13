<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('profile')->with('user', Auth::user());
    }

    public function save(Request $request)
    {
        $user = Auth::user();

        $user->gender = $request->get('gender');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');

        $user->save();

        return Redirect::to('/dashboard');
    }
}
