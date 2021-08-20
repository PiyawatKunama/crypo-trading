<?php

namespace App\Http\Controllers;

use App\Models\CryptoType;
use App\Models\Crypto;
use App\Models\User;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    //
    public function view()
    {
        return view('add-crypto', ['crypto_types' => CryptoType::all()]);
    }
    public function create(Request $req)
    {


        $cryptos = User::find(auth()->user()->id)->cryptos;
        $crypto_type_id = CryptoType::where('name', 'like', $req->input('crypto'))->get()->all()[0]->id;

        $crypto_type_ids = $cryptos->pluck('crypto_type_id')->all();
        $new_crypto = false;
        for ($x = 0; $x < count($crypto_type_ids); $x++) {
            if ($crypto_type_id == $crypto_type_ids[$x]) {
                $new_crypto = true;
            }
        }

        if (!$new_crypto) {
            $crypto = new Crypto;
            $crypto->user_id = auth()->user()->id;
            $crypto->crypto_type_id = $crypto_type_id;
            $crypto->available =  $req->input('amount');
            $crypto->save();
        } else {
            $this->add_usd_available(
                $cryptos
                    ->where("crypto_type_id", "like", $crypto_type_id)
                    ->pluck('id')->all()[0],
                $req->input('amount')
            );
        }

        return redirect('/');
    }
    public function add_usd_available($crypto_id, $amount)
    {
        $crypto = Crypto::find($crypto_id);
        $crypto->available = $crypto->available + $amount;
        $crypto->save();
        return redirect('/');
    }
    
}
