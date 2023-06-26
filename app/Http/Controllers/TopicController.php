<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Question;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $topics = Topic::all();

        return view('topic.index', compact('topics'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
return view('topic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required'
        ]);
        $topic = new Topic;
        $topic->name = $request->name;
        $topic->slug = $request->slug;
        //$topic->image = $request->image;
        //return $request->image;
        $topic->description = $request->description;
        $topic->save();
         $this->saveImage($request, $topic);
        return redirect()->route('topic.index');


    }
// SAVE image in storag/app/public/images , have $topic->id . if   image is null, save default image
// if topic_.$topic->id._img already exists, delete it and save new image in storage/app/public/images
public function saveImage(Request $request, Topic $topic)
{
    $request->validate([
        //  'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = 'topic_'.$topic->id.'_img'.'.'.$image->getClientOriginalExtension();
        $location = storage_path('app/public/images/' . $filename);
        $image->move(storage_path('app/public/images/'), $filename);
        $topic->image = $filename;
        $topic->save();
    } else {
        $topic->image = 'default.jpg';
        $topic->save();
    }
 
}

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
        
        $topic=Topic::find($topic->id);
        $questionsHas= $topic->questions()->get();
        $questionsAll =  Question::all();
        return view('topic.show', compact('topic','questionsHas','questionsAll'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
        $topic=Topic::find($topic->id);
        return view('topic.edit', compact('topic'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        //
        $request->validate([
                    'name' => 'required',
                    'slug' => 'required',
                    'description' => 'required'
                ]);
        $topic = Topic::find($topic->id);
        $topic->name = $request->name;
        $topic->slug = $request->slug;
        $topic->description = $request->description;
        $topic->save();
        if ($request->hasFile('image')) {
            $this->saveImage($request, $topic);
        }

        return redirect()->route('topic.show',$topic->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
        $topic=Topic::find($topic->id);
        $filename = $topic->image;
        if($topic->image != 'default.jpg'){
            if(file_exists(storage_path('app/public/images/' . $filename))){
            unlink(storage_path('app/public/images/' . $filename));
            }
        }
        $topic->delete();
        return redirect()->route('topic.index');
    }
    public function addquestions(Request $request, Topic $topic)
    {
        //
        $request->validate([
            'questions' => 'required',
        ]);
        $topic = Topic::find($topic->id);
        // clear all questions from topic
        $topic->questions()->detach();
         // add questions to topic
        $topic->questions()->attach($request->questions);
       
        return redirect()->route('topic.show',$topic->id);
    }
}
