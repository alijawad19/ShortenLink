<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;

class homeController extends Controller
{
    function show()
    {
        $data = ShortLink::get();
        $count = count($data);
        session()->flash('count', $count);
        return redirect('home');

        // return view('home', ['count'=>$count]);
    }
}
