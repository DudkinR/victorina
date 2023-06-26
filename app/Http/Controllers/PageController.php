<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pages=Page::orderBy('title')->get();
        return view('page.index',compact('pages'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:pages',
            'content'=>'required',
        ]);
        // store
        $page=new  Page();
        $page->title=$request->title;
        $page->slug=$request->slug;
        $page->content=$request->content;
        $page->user_id=Auth::id();
        $page->is_published =  1;
        $page->published_at  = now();
        $page->save();
        // redirect to show
         return    redirect()->route('page.show',$page->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $page=Page::findOrFail($id);
        return view('page.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
$page=Page::findOrFail($id);
return view('page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:pages,slug,'.$id,
            'content'=>'required',
        ]);
        // store
        $page=Page::findOrFail($id);
        $page->title=$request->title;
        $page->slug=$request->slug;
        $page->content=$request->content;
        $page->save();
// redirect to show
         return    redirect()->route('page.show',$page->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $page=Page::findOrFail($id);
        $page->delete();
        return redirect()->route('page.index');
    
    }
}
