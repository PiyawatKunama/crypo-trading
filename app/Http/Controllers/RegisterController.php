<?php

namespace App\Http\Controllers;

use App\Models\Fiat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);


        Auth::login(User::create($attributes));

        $fiat = new Fiat;
        $fiat->user_id = auth()->user()->id;
        $fiat->usd_available =  0;
        $fiat->save();

        return redirect('/');
    }
}
