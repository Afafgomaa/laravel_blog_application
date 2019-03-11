@extends('layouts.back')

@section('content')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Users</h4>
                  <p class="card-category"> Here is all Users</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Edit Permission</th>
                        <th scope="col">Delete</th>

                      </thead>
                      <tbody>
                        <?php $count = 1 ;?>
                        @foreach($users as $user)
                        <tr>
                          <th scope="row">{{$count++}}</th>
                          <td>{{$user->name}}</td>
                          <td><a href="#">
                            @if($user->admin == 0)
                             <a href="{{route('user.admin',['id' => $user->id] )}}">Add Permission</a>
                            @else
                             <a href="{{route('user.non.admin' ,['id' => $user->id] )}}">Remove Permission</a>

                            @endif

                          </a></td>
                          <td><a href="{{route('user.delete',[ 'id' => $user->id ])}}">Delete</a></td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection