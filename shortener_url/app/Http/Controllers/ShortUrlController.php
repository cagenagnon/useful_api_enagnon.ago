<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{

    public function index()
    {
        $links = ShortUrl::all();
        return $links;
    }
    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $existing = ShortUrl::where('original_url', $request->url)->first();
        if ($existing) {
            return response()->json([
                'short_url' => url($existing->code)
            ]);
        }

        $custom_code = Str::random(10);

        while (ShortUrl::where('code', $custom_code)->exists()) {
            $custom_code = Str::random(10);
        }

        $shortUrl = ShortUrl::create([
            'id' => $request->id,
            'original_url' => $request->url,
            'code' => $custom_code,
            'created_at' => $request->date_timestamp

        ]);

        return response()->json(
            $shortUrl,
            201
        );
    }

    public function redirect($code)
    {
        $shortUrl = ShortUrl::where('code', $code)->firstOrFail();
        return redirect($shortUrl->original_url);
    }

    public function clickcount($code) {

    }
}
