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
                  @include('admin.includes.errors')
                     <form action="{{route('Tag.store')}}" method="post">
                      {{ csrf_field()}}
                        <div class="form-group">
                          <label for="name">Tag Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Example wordpress">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="form-control btn btn-light" placeholder="Email">Save Tag</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection