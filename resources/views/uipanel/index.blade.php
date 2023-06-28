<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<a target="_blank" href="https://icons8.com/icon/123415/search-more"></a>
<style>

</style>
</head>
<body>
<section style="background-color: rgb(235, 234, 255);">
    <div class="container font-monospace" style="background-color: rgb(235, 234, 255);">
          <nav class="navbar navbar-expand-lg px-2">
              <a class="navbar-brand" href="#">MY BLOG</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <div class="  dropdown ">
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
              </div>
          </nav>
        </div>
  </section>
          <div class="container-fluid pt-5 px-5" style="background-color: rgb(38, 36, 66);">
          <div id="carouselExample" class="carousel rounded slide shadow">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/image/dogimg.jpg" style="width:100px ;height:500px" class="d-block w-100 img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <img src="/image/dogimg2.jpg" style="width:100px ;height:500px" class="d-block w-100 img-fluid" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
       
            <div class="row align-items-center mt-4 mx-3 ">
              <div class="col" >
                <label for="" class="text-white">Search by Category</label>
                <div class="mt-1">
                  <a class="btn btn-light btn-sm " href="{{url('/home')}}">Show all</a>
                  @foreach ($categories as $category)
                  <a class="btn btn-light btn-sm" href="{{url('/home/searchbycategory/'.$category->id)}}">{{$category->name}}</a>
                  @endforeach
                </div>
              </div>
              
              <div class="col">
                <form class="d-flex float-end mt-4" role="search">
                  <input class="form-control me-2" name="q" style="width: 280px" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-dark btn-sm" type="submit"><img src="https://img.icons8.com/material/24/FFFFFF/search-more--v2.png"/></button>
                </form>
              </div>
            </div>
          </div>
          <section class="px-5 pt-2" style="background-color: rgb(38, 36, 66);">
            @foreach ($posts as $post)
            <div class="card my-3 mx-5 shadow-sm">
              <div class="card-header">
                <strong class="text">{{$post->title}}</strong> 
                <span class="text-muted d-flex float-end">
                  <small class="text-muted">{{$post->created_at->diffForHumans()}}</small>
              </span>
              </div>
              <div class="card-body">
                <p class="card-text lead text-break">{{Str::words($post->content,40)}}</p>
                <h6 class="card-title text-muted">Posted By: {{$post->user->name}}</h6>
                <h6 class="card-title text-muted">Category: {{$post->category->name}}</h6>
                <a href="{{url ('/home/postdetail/'.$post->id)}}" class=" mx-3 mt-1 float-end position-relative"><img style="width:30px ;height:30px" src="https://img.icons8.com/ios/50/null/comments--v1.png"/>
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      <span>{{$post->comments->count()}}</span>
                      <span class="visually-hidden">unread messages</span>
                    </span></a>
                <a href="{{url ('/home/postdetail/'.$post->id)}}" class="btn btn-outline-primary float-end">See More</a>
              </div>
            </div>
            @endforeach
            {{$posts->links()}}
          </section>
         
        
    
    <!-- footer -->
<footer style="background-color: rgb(235, 234, 255);" class="border">
  <div id="footer" class="container text-center px-5 my-5">
    <ul class="nav	justify-content-center">
      <li class="nav-item">
        <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="#">About</a>
      </li>
    </ul>
    {{-- <br>
    <img src="pic/fb.png" class="mx-2" style="height: 24px ;width: 24px" alt="">
    <img src="pic/ig.png" class="mx-2"style="height: 24px ;width: 24px"   alt="">
    <img src="pic/tt.png"  class="mx-2" style="height: 24px ;width: 24px"   alt="">
    <img src="pic/github.png" class="mx-2" style="height: 24px ;width: 24px"   alt="">
    <img src="pic/world.png" class="mx-2"  style="height: 24px ;width: 24px"   alt="">
    <br>
    <br> --}}
    <br>
    <DIV style="color: rgb(0, 0, 0);">© 2022 Softcomm Technology, Inc. All rights reserved.</DIV>

  </div>
</footer>

     <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

