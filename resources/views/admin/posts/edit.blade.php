@extends('layouts.app')

@section('content')
<div class="container">
  @include('admin.includes.errors')
        <form method="post" action="{{route('posts.update',['id' => $post->id])}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="form-group">
              <label for="exampleFormControlInput1">Title</label>
              <input name="title" type="text" value="{{$post->title}}" class="form-control">
            </div>
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <div class="form-group">
              <label>Chooes Image</label>
              <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Select category</label>
              <select class="form-control" name="category_id">
                <option selected disabled>Cheooes Category</option>
                
                @foreach($categories as $category)
                     
                     
                <option @if($category->id == $post->category_id) {{"selected"}} @endif value="{{$category->id}}">{{$category->name}}</option>
                     
                @endforeach
              </select>
            </div>

            <div>
              <label for="tag">Select All Tags  : &nbsp; &nbsp;</label>
              @foreach($tags as $tag)
             <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"

              @foreach($post->tags as $t)
                @if($tag->id == $t->id)
                         checked
                @endif
              @endforeach


              >{{$tag->name}} &nbsp; &nbsp;</label>
              @endforeach
            </div>
            
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Content</label>
              <textarea  class="form-control" name="content" rows="3">{{$post->content}}</textarea>
            </div>

            <div class="form-group">
                <button class="form-control btn btn-success" type="submit">Save Post</button>
            </div>
</form>
    
</div>
@endsection