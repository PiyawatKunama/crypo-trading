<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class CryptoCurrency
{

    public static function all()
    {
        $files =  File::files(resource_path("crypto_currencies/"));
        return array_map(fn ($file) => $file->getcontents(), $files);
    }
    public static function find($slug)
    {
        if (!file_exists($path = resource_path("crypto_currencies/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }
        return cache()->remember("crypto_currencies.{$slug}", 1200, fn () => file_get_contents($path));
    }
}
