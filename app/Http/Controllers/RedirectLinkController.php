<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;

class RedirectLinkController extends Controller
{
    public function shortenLink($code)
    {
        $data = ShortLink::where('short_url', $code)->first();
        if(empty($data))
        {
            return redirect('404');
        }
        
        return redirect($data->url);
    }
}
