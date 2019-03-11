@extends('layouts.back')

@section('content')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create New Post</h4>
                </div>
                <div class="card-body">
                     @include('admin.includes.errors')

        <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Title</label>
              <input name="title" type="text" class="form-control" placeholder="title" autofocus="on">
            </div>
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Select category</label>
              <select class="form-control" name="category_id">
                <option selected disabled>Cheooes Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label>Chooes Image</label>
              <input type="file" name="image" class="form-control" style="width: 100%">
            </div>

            <div>
              <label for="tag">Select All Tags  : &nbsp; &nbsp;</label>
              @foreach($tags as $tag)
             <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}} &nbsp; &nbsp;</label>
              @endforeach
            </div>
            
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Content</label>
              <textarea id="summernote" class="form-control" name="content" rows="3"></textarea>
            </div>

            <div class="form-group">
                <button class="form-control btn btn-success" type="submit">Save Post</button>
            </div>
</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection