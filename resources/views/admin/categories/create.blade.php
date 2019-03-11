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
            <form method="post" action="{{route('category.store')}}">
                 {{csrf_field()}}
              <div class="form-group">
                <label class="float-center" for="formGroupExampleInput">Creat New Category</label>
                <input type="text" class="form-control" name="name" placeholder="Example Books">
              </div>
              <div class="form-group">
                <button type="submit" class="form-control btn btn-light" id="formGroupExampleInput2">Save</button>
              </div>
            </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
