@extends('layouts.back')

@section('content')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Categories</h4>
                  <p class="card-category"> Here is all Categories</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                      </thead>
                      <tbody>
                            <?php $count = 1;?>
                    @foreach($categories as $category)
                      <tr>
                        <th scope="row">{{$count++}}</th>
                        <td>{{$category->name}}</td>
                        <td><a href="{{route('category.edit',[ 'id' => $category->id ] )}}">Edit</a></td>
                        <td><a href="{{route('category.delete',[ 'id' => $category->id ] )}}">Delete</a></td>
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