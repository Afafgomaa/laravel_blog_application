@extends('layouts.back')

@section('content')

      <div class="content">
        <div class="container-fluid">
          @include('admin.includes.errors')
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Tags</h4>
                  <p class="card-category"> Here is all Tags</p>
                </div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tag Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 1;?>
                      @foreach($tags as $tag)
                      <tr>
                        <th scope="row">{{$count++}}</th>
                        <td>{{$tag->name}}</td>
                        <td><a href="{{route('Tag.edit',['id' => $tag->id ] ) }}">Edit</a></td>
                        <td>
                  <form method="post" action="{{route('Tag.destroy',['tag' => $tag->id ] )}}">
                    @csrf
                    @method('DELETE')
                  <input type="submit" value="Delete">
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
      </div>
@endsection