@extends('layouts.back')

@section('content')

      <div class="content">
        <div class="container-fluid">
          @include('admin.includes.errors')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tags</h4>
                </div>
                <div class="card-body">
                     <form method="post" action="{{route('Tag.update', ['id' => $tag->id ])}}">
                       @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Edit Tag Name</label>
                          <input type="text" value="{{$tag->name}}" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="form-control btn btn-success">Update Tag</button>
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