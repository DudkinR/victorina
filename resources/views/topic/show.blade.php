@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Topic') }}
                    <a href="{{ route('topic.index') }}">List</a>

                </div>
                <div class="card-body">
                      <h1>{{$topic->name}}</h1>
                        <h2>{{$topic->slug}}</h2>
                        <p>    <img src="{{ asset('storage/images/' . $topic->image) }}" alt="image" width="100" height="100">
                        {{$topic->description}}</p>
                    <p>Created at: {{$topic->created_at}}</p>
                    <p>Updated at: {{$topic->updated_at}}</p>
                    <a href="{{route("topic.edit", $topic->id)}}" >Edit</a>
                    <form action="{{ route('topic.destroy',$topic->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                    </form>

                </div>
                <div   class="card-footer">
                    <form  action="{{ route('topic.addquestions',$topic->id) }}" method="POST">
                        @csrf
                        <div   class="form-group">
                        <label for="question">Question</label>
                        <?php
                        $myQuestions =$questionsHas->pluck('id')->toArray();
                        ?>
                        <select name="questions[]" id="questions" class="form-control" size="10" multiple>
                        @foreach($questionsAll as $question)
                        <option value="{{$question->id}}"
                          @if(in_array($question->id,$myQuestions))
                            selected
                           @endif

                        >{{$question->content}}</option>
                        @endforeach
                        </select>
                        </div>

                        <button type="submit">Add questions</button>
                     </form>

            </div>
        </div>
    </div>
</div>
@endsection
