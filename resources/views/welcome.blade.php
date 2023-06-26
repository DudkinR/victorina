<?php
use Illuminate\Support\Str;
?>
<div class="container text-center">
  <div class="row">
   @foreach($pages as $page)
       <div class="col-sm-6 border">

      {!! Str::limit($page->content, 500, '...') !!} </p>
      <a href="{{ route('page.show',$page->id) }}" class="btn btn-primary">
            Go...
        </a>
         </div>
   @endforeach
  </div>
</div>
