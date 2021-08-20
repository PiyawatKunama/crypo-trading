<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoType extends Model
{
    use HasFactory;
    public function cryptos()
    {
        return $this->hasMany(Crypto::class);
    }
}
