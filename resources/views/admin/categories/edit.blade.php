@extends('layouts.back')

@section('content')
 @include('admin.includes.errors')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Categories</h4>
                </div>
                <div class="card-body">
                  <form method="post" action="{{route('category.update', ['id' => $category->id ])}}">
                       {{csrf_field()}}
                        <div class="form-group">
                          <label for="name">Edit Category</label>
                          <input type="text" value="{{$category->name}}" class="form-control" name="name" placeholder="Example Books">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="form-control btn btn-success">Update Category</button>
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection