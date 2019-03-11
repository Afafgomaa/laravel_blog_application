
<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{route('index')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('user.profile')}}">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('category.create')}}">
              <i class="material-icons">content_paste</i>
              <p>Create New category</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('user.create')}}">
              <i class="material-icons">library_books</i>
              <p>Create New User</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('Tag.create')}}">
              <i class="material-icons">bubble_chart</i>
              <p>Craete New Tag</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('posts.create')}}">
              <i class="fa fa-edit"></i>
              <p>Create New Post</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('setting.index')}}">
              <i class="fa fa-flag"></i>
              <p>Setting</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
          <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->