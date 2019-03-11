@extends('layouts.back')

@section('content')

      <div class="content">
        <div class="container-fluid">
            @include('admin.includes.errors')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Categories</h4>
                  <p class="card-category"> Here is all Categories</p>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Post title</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $count = 1;?>
                        @foreach($posts as $post)
                        <tr>
                          <th scope="row">{{$count++}}</th>
                          <td>{{$post->title}}</td>
                          <td><a href="{{route('posts.edit',['post' => $post->id ] ) }}">Edit</a></td>
                          <td>
                    <form method="post" action="{{route('posts.destroy',['post' => $post->id ] )}}">
                      @csrf
                      @method('DELETE')
                    <button type="submit">Delete</button>
                    </form>
                    </td>
                            
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
@endsection