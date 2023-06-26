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
                    <form action="{{ route('topic.update',$topic->id) }}" method="POST"  enctype="multipart/form-data">   
                    <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" value="{{$topic->name}}" id="name" name="name">
                    </div>
                    <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" value="{{$topic->slug}}" id="slug" name="slug">
                    </div>

                    <div class="form-group">
                    <label for="description">description</label>
                    <textarea class="form-control" id="description"  name="description" rows="3">{{$topic->name}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="row" id="img_container">
                    <img src="{{asset('storage/images/'.$topic->image)}}" alt="{{$topic->slug}}" width="100px">
                    </div>
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   document.getElementById('image').addEventListener('change', function(){
    var file = this.files[0];
    var reader = new FileReader();
    reader.onloadend = function(){
        var img_container = document.getElementById('img_container');

        // Очищаем содержимое контейнера img_container
        while (img_container.firstChild) {
            img_container.removeChild(img_container.firstChild);
        }

        var img = document.createElement('img');
        img.alt = document.getElementById('slug').value;
        img.src = reader.result;
        img_container.appendChild(img);
    }
    reader.readAsDataURL(file);
});



</script>
@endsection
