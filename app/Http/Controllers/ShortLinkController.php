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

    function edit($id)
    {
        $data = ShortLink::find($id);
        return view('edit', ['data'=>$data]);

    }

    function update(Request $request)
    {
        $check = ShortLink::where('short_url', $request->short_url)->where('id', "!=", $request->id)->first();
        if(empty($check))
        {
            $data = ShortLink::find($request->id);
            $data->title = $request->title;
            $data->short_url = $request->short_url;
            $data->url = $request->url;
            $data->save();
            return redirect("shortenlink")->withSuccess('URL Edited Successfully.');
        }

        session()->flash('urltaken', 'Short URL already taken. Please try a different one');
        return redirect("edit/".$request->id);
    }

    function delete($id)
    {
        $data = ShortLink::find($id);
        $data->delete();
        return redirect("shortenlink")->with('delete','Deleted Successfully.');
    }
}
