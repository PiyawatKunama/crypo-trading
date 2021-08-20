<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Models\CryptoType;
use App\Models\Fiat;
use App\Models\FiatType;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('posts', [
            'posts' => $this->getPosts(),
            'fiat_types' => FiatType::all(),
            'fiat' =>  $this->getFiat()
        ]);
    }


    public function getPosts()
    {
        $posts = Post::with('user')->get();
        $sorted_post = array();
        if (request('search')) {
            // $posts->where('selling_price', '<=', request('search'));

            for ($x = 0; $x < count($posts); $x++) {
                $crypto = Crypto::find($posts[$x]->crypto_id);
                if ($crypto->available / $crypto->crypto_type->usd_exchange_rate   <= request('search')) {
                    array_push($sorted_post, $posts[$x]);
                }
            }
            return $sorted_post;
        }
        return $posts;
    }

    public function getFiat()
    {
        if (auth()->user()) {

            $fiat = Fiat::where('user_id', '=', auth()->user()->id)->get()->collect()->all();

            if ($fiat == []) {
                $fiat = new Fiat;
                $fiat->usd_available =  0;
                return $fiat;
            } else {
                return $fiat[0];
            }
        } else {
            $fiat = new Fiat;
            $fiat->usd_available =  0;
            return $fiat;
        }
    }

    public function view_post_buy()
    {
        return view('post-buy', [
            'posts' => $this->getPosts(),
            'fiat' =>  $this->getFiat(),
            'crypto_types' => CryptoType::all()
        ]);
    }


    public function create(Request $req)
    {
        $usd_exchange_rate = CryptoType::where('name', 'like', $req->input('crypto'))->get()->all()[0]->usd_exchange_rate;
        $one_crypto = $usd_exchange_rate *  $req->input('price');
        $req->merge([
            'amount' => $one_crypto,
            'enough' => true,
        ]);

        app('App\Http\Controllers\FiatController')->buy_crypto($req);

        if ($req->input('enough')) {
            app('App\Http\Controllers\CryptoController')->create($req);


            $last_crypto = Crypto::orderBy('created_at', 'desc')->first();

            $crypto = new Post;
            $crypto->user_id = auth()->user()->id;
            $crypto->crypto_id = $last_crypto->id;
            $crypto->trade_type = "buy";
            $crypto->num_max_coin =   $req->input('amount');
            $crypto->usd_selling_price =  $req->input('price_per_coin');
            $crypto->save();
        }
        return redirect('/');
    }


    public function view_post_sell()
    {
        return view('post-sell', [
            'posts' => $this->getPosts(),
            'fiat' =>  $this->getFiat(),
            'cryptos' => $this->crypto_param(),
            'crypto_types' => CryptoType::all()
        ]);
    }
    public function create_sell(Request $req)
    {
        $user = User::find(auth()->user()->id);
        $crypto_type_id = CryptoType::where('name', 'like', $req->input('crypto'))->get()->all()[0]->id;


        $crypto = $user->Cryptos->where("crypto_type_id", "=", $crypto_type_id)->values()[0];

        $crypto->available = $crypto->available - $req->input('price');
        $req->merge([
            'clone_price' => $req->input('price'),
            'price' => '-' . $req->input('price') * $req->input('crypto_per_usd'),
        ]);
        $crypto->save();


        app('App\Http\Controllers\FiatController')->buy_crypto($req);


        $last_crypto = Crypto::orderBy('created_at', 'desc')->first();
        $crypto = new Post;
        $crypto->user_id = auth()->user()->id;
        $crypto->crypto_id = $last_crypto->id;
        $crypto->trade_type = "sell";
        $crypto->num_max_coin =   $req->input('clone_price');
        $crypto->usd_selling_price =  $req->input('crypto_per_usd');
        $crypto->save();
        return redirect('/');
    }

    public function crypto_param()
    {
        $cryptos = [];
        if (auth()->user()) {
            $cryptos = User::find(auth()->user()->id)->cryptos->all();
        }
        return $cryptos;
    }
}
