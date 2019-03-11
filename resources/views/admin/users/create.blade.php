@extends('layouts.back')

@section('content')
 @include('admin.includes.errors')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Users</h4>
                </div>
                <div class="card-body">
                 <form action="{{route('user.store')}}" method="post">
                  {{ csrf_field()}}
                    <div class="form-group">
                      <label for="name">User Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Example jon">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" placeholder="write Your Email">
                    </div>

                    <div class="form-group">
                      <button type="submit" class="form-control btn btn-light"> Save User</button>
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection