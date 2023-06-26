<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Page
use App\Models\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pages=Page::orderBy('title')->get();
        return view('home',compact('pages'));
    }
}
