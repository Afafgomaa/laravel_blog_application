@extends('layouts.back')

@section('content')
<!--
<div class="container">
    @include('admin.includes.errors')
    <div class="row justify-content-center">
      <div class="col-md-8">
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Categories</div>
  <div class="card-body">
    <h5 class="card-title">Control Category</h5>
    <p class="card-text"><a href="{{route('category.index')}}">Show All Category</a></p>
    <p class="card-text"><a href="{{route('category.create')}}">Create New Category</a></p>
    <p class="card-text">

    </p>
  </div>
</div>
<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Users</div>
  <div class="card-body">
    <h5 class="card-title">Show All Users</h5>
    <p class="card-text"><a href="{{route('users')}}">Show All Users</a></p>

    <p class="card-text"><a href="{{route('user.create')}}">Create New User</a></p>
    <p class="card-text"></p>
  </div>
</div>
<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header">Posts</div>
  <div class="card-body">
    <h5 class="card-title">Show All Posts</h5>
    <p class="card-text"><a href="{{route('posts.index')}}">Show All Posts</a></p>
    <p class="card-text"><a href="{{route('posts.create')}}">Creat New Post</a></p>
    <p class="card-text"></p>
  </div>
</div>
<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Tags</div>
  <div class="card-body">
    <h5 class="card-title">Show All Tags</h5>
    <p class="card-text"><a href="{{route('Tag.index')}}">Show All Tags</a></p>
    <p class="card-text"><a href="{{route('Tag.create')}}">Creat New Tag</a></p>
    <p class="card-text"></p>
  </div>
</div>


<div class="card bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header">Setting</div>
  <div class="card-body">
    <h5 class="card-title">Setting Site</h5>
    <p class="card-text"><a href="{{route('setting.index')}}">Setting</a></p>
        <p class="card-text"><a href="{{route('setting.index')}}">Setting</a></p>
    <p class="card-text"></p>
  </div>
</div>
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">My Profile</div>
  <div class="card-body">
    <h5 class="card-title">Change Profile </h5>
    <p class="card-text"><a href="{{route('user.profile')}}">Show Your Profile</a></p>
        <p class="card-text"><a href="{{route('user.profile')}}">Show Your Profile</a></p>
    <p class="card-text"></p>
  </div>
</div>
</div>
    </div>
</div>
-->


      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Posts</p>
                  <h3 class="card-title">
                    {{$count_post}}

                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                    <a href="{{route('posts.index')}}">Show All Posts</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-edit"></i>
                  </div>
                  <p class="card-category">Tags</p>
                  <h3 class="card-title">{{$count_tag}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i> <a href="{{route('Tag.index')}}">Show All Tags</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-home"></i>
                  </div>
                  <p class="card-category">Categories</p>
                  <h3 class="card-title">{{$count_category}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i><a href="{{route('category.index')}}">Show All Category</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">Users</p>
                  <h3 class="card-title">{{$count_users}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i><a href="{{route('users')}}">Show All User</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Users Stats</h4>
                  <p class="card-category">New Users on 15th September, 2018</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Stats</th>
                      <th>Country</th>
                    </thead>
                    <tbody>
                     <?php $count = 1 ;?>
                      @foreach($users_first_4 as $user)
                       <tr>
                         <td>{{$count++}}</td>
                         <td>{{$user->name}}</td>
                         <td>{{$user->profile->facebook}}</td>
                         <td>{{$user->name}}</td>

                       </tr>

                      @endforeach
                      <!---
                      <tr>
                        <td>1</td>
                        <td>Dakota Rice</td>
                        <td>$36,738</td>
                        <td>Niger</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Minerva Hooper</td>
                        <td>$23,789</td>
                        <td>Curaçao</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Sage Rodriguez</td>
                        <td>$56,142</td>
                        <td>Netherlands</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Philip Chaney</td>
                        <td>$38,735</td>
                        <td>Korea, South</td>
                      </tr>
                    -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection























