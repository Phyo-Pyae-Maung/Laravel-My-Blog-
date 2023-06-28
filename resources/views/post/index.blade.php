<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


<style>
body {
background-color: #fbfbfb;
}
@media (min-width: 991.98px) {
main {
padding-left: 200px;
}
}

/* Sidebar */
.sidebar {
position: fixed;
top: 0;
bottom: 0;
left: 0;
padding: 58px 0 0; /* Height of navbar */
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
width: 200px;
z-index: 600;
}

@media (max-width: 991.98px) {
.sidebar {
width: 100%;
}
}
.sidebar .active {
border-radius: 5px;
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
position: relative;
top: 0;
height: calc(100vh - 48px);
padding-top: 0.5rem;
overflow-x: hidden;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
</style>

</head>


<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-2 mt-4">
          <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
          </a>
          <a href="{{url('admin/categories')}}" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Category</span>
          </a>
          <a href="{{url('admin/posts')}}" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-building fa-fw me-3"></i><span>Posts</span></a>
          <a href="{{url('admin/users')}}" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
  
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
  
        <!-- Brand -->
        <a class="navbar-brand ms-4" href="#">MY BLOG
        </a>
        {{-- <!-- Search form -->
        <form class="d-none d-md-flex input-group w-auto my-auto">
          <input autocomplete="off" type="search" class="form-control rounded"
            placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px;" />
          <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
        </form> --}}
  
        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          {{-- <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bell"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="#">Some news</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Another news</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Something else here</a>
              </li>
            </ul>
          </li> --}}
  
          <!-- Icon -->
          {{-- <li class="nav-item">
            <a class="nav-link me-3 me-lg-0" href="#">
              <i class="fas fa-fill-drip"></i>
            </a>
          </li>
          <!-- Icon -->
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="#">
              <i class="fab fa-github"></i>
            </a>
          </li>
  
          <!-- Icon dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdown"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="united kingdom flag m-0"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                  <i class="fa fa-check text-success ms-2"></i></a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
              </li>
            </ul>
          </li> --}}
  
          <!-- Avatar -->
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
              id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle"
                height="22" alt="Avatar" loading="lazy" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="#">My profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Settings</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Logout</a>
              </li>
            </ul>
          </li> --}}
          <form class="d-flex me-5 pe-3" role="search">
            <div class=" dropdown ">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(auth()->check())
                {{ auth()->user()->name }}
                @endif
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{url('/login')}}">Login</a></li>
                <li><a class="dropdown-item" href="{{url('/logout')}}">Logout</a></li>
              </ul>
            </div>
          </form>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <body>
  <!--Main Navigation-->
  
  <!--Main layout-->
  <main style="margin-top: 60px;">
        <div class="">
            <div class="container">
                <h2 class="">Post</h2>
                @if(auth()->check()) 
                <h5 class="text-center">Welcome: {{auth()->user()->name}}</h5>
                @endif
                <hr>
                <div class="row">           
                    <div class="d-flex justify-content-between">
                   <h4>Post Lists</h4>

                    <a href="{{ url('admin/posts/create')}}" input="post" class="btn btn-primary">Add Post</a>
                    </div>

                    <form class=" mt-4" role="search">
                    <div class="input-group my-1" style="width: 290px">
                      <input type="text" class="form-control" placeholder="Search" name="q">
                      <div class="input-group-append">
                        <button  class="btn btn-light btn-sm mx-1" type="submit"><img style="width:30px ;height:30px" src="https://img.icons8.com/ios/50/null/search-more.png"/></button>
                      </div>
                      </div>
                    </form>
                  </div>
                  
                  
                    
        
                @if(session()->has('msg'))
                <div class="alert alert-success">
                    <span>{{session()->get('msg')}}</span>
                    <button data-bs-dismiss="alert" class="btn btn-close float-end"></button>
                </div>
                @endif
        
                    <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->content}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>
                                    
                            <form action="{{ url('admin/posts/'.$post->id.'/delete')}}" method="post">
                            @csrf
                            <a href="{{ url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger my-2" onclick="return comfirm('are you sure want to delete')">Delete</button>
        
                            <a href="{{ url('admin/posts/'.$post->id.'/comments')}}" class="btn btn-secondary btn-sm position-relative">View Comment
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <span>{{$post->comments->count()}}</span>
                                    <span class="visually-hidden">unread messages</span>
                                  </span></a>
        
                            </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$posts->links()}}
                        
                </div>
              
                </div>
            </div>
  </main>
  <!--Main layout-->



    



    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

{{-- Comment (Table)

ID
Text
Post_ID
User_ID

Status==> Approved/Denied

Read only

Action ( Denied Button ) --}}