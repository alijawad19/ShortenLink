<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    function show()
    {
        $data = ShortLink::where('user_id', session('user_id'))->orderBy('created_at','desc')->get();
        return view('shortenlink', ['collection'=>$data]);
    }
    
    public function shortenurl(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $data = $request->input();

        $data = [
            'title' => $request['title'],
            'short_url' => Str::random(6),
            'url' => $request['url'],
            'user_id' => session('user_id')
        ];

        ShortLink::create($data);
        return redirect("shortenlink")->withSuccess('URL Shortened Successfully.');
    }
}
