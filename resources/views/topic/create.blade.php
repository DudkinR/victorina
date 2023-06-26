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
                    <form action="{{ route('topic.store') }}" method="POST"  enctype="multipart/form-data">   
                    <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                    </div>

                    <div class="form-group">
                    <label for="description">description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="row" id="img_container">
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// without qwery
document.getElementById('image').addEventListener('change', function(){
    var file = this.files[0];
    var reader = new FileReader();
    reader.onloadend = function(){
        document.getElementById('img_container').innerHTML = '<img src="' + reader.result + '" />';
    }
    reader.readAsDataURL(file);
});
</script>
@endsection
