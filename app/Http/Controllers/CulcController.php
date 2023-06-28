<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class CulcController extends Controller
{
    //
    public function culc1(Request $request)
    {
        $topic= Topic::where('slug','=','d fast')->first();
        return view('culc.culc1', compact('topic'));
    }
    public function culc2(Request $request)
    {
        $topic= Topic::where('slug','=','current')->first();
        return view('culc.culc2', compact('topic'));
    }
    public function culc3(Request $request)
    {
        $topic= Topic::where('slug','=','Save d')->first();
        return view('culc.culc3', compact('topic'));
    }
    public function culc4(Request $request)
        {
	        $topic= Topic::where('slug','=','Dep added')->first();
	        return view('culc.culc4', compact('topic'));
        }
    public function culc5(Request $request)
        {
	        $topic= Topic::where('slug','=','Dep cap')->first();
	        return view('culc.culc5', compact('topic'));
        }

}
