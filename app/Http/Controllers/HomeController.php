<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $links = Link::all();
        return view('home', compact('links'));
    }
}
