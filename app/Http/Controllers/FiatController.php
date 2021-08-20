<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiat;
use App\Models\FiatType;
use App\Models\User;


class FiatController extends Controller
{
    //
    public function view()
    {
        return view('add-Fiat', ['fiat_types' => FiatType::all()]);
    }
    public function create(Request $req)
    {
        $usd_exchange_rate = FiatType::where('name', 'like', $req->input('fiat'))->get()[0]->usd_exchange_rate;
        $usd_amount = $req->input('amount') / $usd_exchange_rate;

        $fiats = User::find(auth()->user()->id)->fiats;
        $num_fiats = $fiats->all();

        if (count($num_fiats) == 0) {
            $fiat = new Fiat;
            $fiat->user_id = auth()->user()->id;
            $fiat->usd_available =  $usd_amount;
            $fiat->save();
        } else {
            $this->add_usd_available($fiats[0], $usd_amount);
        }
        return redirect('/');
    }
    public function add_usd_available($fiat, $usd_amount)
    {
        $fiat = Fiat::find($fiat->id);
        $fiat->usd_available =  $fiat->usd_available + $usd_amount;
        $fiat->save();
        return redirect('/');
    }

    public function buy_crypto(Request $req)
    {
        $fiat = Fiat::find(auth()->user()->id);

        if ($fiat->usd_available - $req->input('price') >= 0) {
            $fiat->usd_available = $fiat->usd_available - $req->input('price');
            $fiat->save();
        } else {
            $req->merge([
                'enough' => false,
            ]);
        }

        // dd($fiat);
        // $crypto = $user->Cryptos->where("crypto_type_id", "=", $crypto_type_id)->values()[0];


    }
}
