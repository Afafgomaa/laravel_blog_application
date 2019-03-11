@extends('layouts.back')

@section('content')

      <div class="content">
        <div class="container-fluid">
          @include('admin.includes.errors')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Settings</h4>
                </div>
                <div class="card-body">
                     @include('admin.includes.errors')
                        <form method="post" action="{{route('setting.store')}}">
                             {{csrf_field()}}
                          <div class="form-group">
                            <label class="float-center" for="formGroupExampleInput">Address</label>
                            <input type="text" class="form-control" value="{{$setting->address}}" name="address" >
                          </div>
                          <div class="form-group">
                            <label class="float-center" for="formGroupExampleInput">Site Name</label>
                            <input type="text" class="form-control" value="{{$setting->site_name}}" name="site_name">
                          </div>
                          <div class="form-group">
                            <label class="float-center" for="formGroupExampleInput">Contact Number</label>
                            <input type="text" class="form-control" value="{{$setting->contact_number}}" name="contact_number">
                          </div>
                          <div class="form-group">
                            <button type="submit" class="form-control btn btn-success" id="formGroupExampleInput2">Save</button>
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