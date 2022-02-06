<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;

class homeController extends Controller
{
    public static function show()
    {
        $data = ShortLink::get();
        $count = count($data);
        session()->flash('count', $count);
        return redirect('home');
    }
}
