<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<a target="_blank" href="https://icons8.com/icon/87073/topic"></a>
<a target="_blank" href="https://icons8.com/icon/83749/remove"></a>
<style>

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}

</style>
</head>
<body>
  <section style="background-color: rgb(235, 234, 255);">
    <div class="container font-monospace" >
          <nav class="navbar navbar-expand-lg" style="background-color: rgb(235, 234, 255);">
            <div class="container-fluid">
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
                  <div class="nav-item dropdown ">
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
            </div>
          </nav>
        </div>
        </section>
          <section class="px-5 py-3" style="background-color: rgb(38, 36, 66);" >
            <div class="card my-3 shadow-sm mx-5" >
              <div class="card-header">
                <strong class="text">{{$post->title}}</strong> 
                
              </div>
              <div class="card-body">
                <p class="card-text lead text-break">{{$post->content}}</p>
                <h6 class="card-title text-muted">Posted By: {{$post->user->name}}</h6>
                <h6 class="card-title text-muted">Category: {{$post->category->name}}</h6>

              <form method="post">
                @csrf
                      <div class="d-flex float-end mt-1 position-relative" role="group" aria-label="Basic example">
                        <button type="submit" formaction="{{url('admin/posts/dislike/'.$post->id)}}" class="btn btn-secondary btn-sm" 
                       @if ($likeStatus)
                              @if ($likeStatus->type == 'dislike')
                              disabled
                              @endif 
                       @endif
                      ><img style="width:30px ;height:30px" src="https://img.icons8.com/ios-filled/50/FFFFFF/thumbs-down.png"/><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                          <span>{{$dislikes->count()}}</span>
                          <span class="visually-hidden">unread messages</span>
                          </span></button>
                        </div>
                        <div class="d-flex float-end mx-3 mt-1 position-relative" role="group" aria-label="Basic example">
                          <button type="submit" formaction="{{url('admin/posts/like/'.$post->id)}}" class="btn btn-secondary btn-sm"                        
                      @if ($likeStatus)
                          @if ($likeStatus->type == 'like')
                          disabled
                            @endif 
                      @endif><img style="width:30px ;height:30px" src="https://img.icons8.com/ios-filled/50/FFFFFF/thumb-up--v1.png"/><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <span>{{$likes->count()}}</span>
                            <span class="visually-hidden">unread messages</span>
                            </span></button>
                          </div>

              </form>
              </div>
              <form action="{{url('admin/post/comment/'.$post->id)}}" method="POST">
                @csrf
                <div class="card-footer">
                <label class="form-label" for="textAreaExample">Your Comment</label>
                <div class="d-flex flex-start w-100">
                  <div class="form-outline w-100">
                    <textarea class="form-control" name="text" id="textAreaExample" rows="1"
                      style="background: #fff;" required></textarea>
                  </div>
                </div>
                <div class=" mt-2 pt-1">
                <button type="submit" class="btn btn-primary align-items-center">Submit</button>
                <a href="" type="reset"><span class="px-2" ><img src="https://img.icons8.com/material-outlined/24/FA5252/waste.png"/></span></a>
                <a href="{{ url('/home')}}"  class="btn btn-secondary float-end">Back</a>
                </div>
              </div>
              </form>

              <div class="card-footer">
              @foreach ($comments as $comment)
            <div class="media-list">
              <div class="media">
                <div class="media-body">
                    <strong class="text-success">{{$comment->user->name}}</strong>
                    <span class="text-muted d-flex float-end">
                      <small class="text-muted">{{$comment->created_at->diffForHumans()}}</small>
                  </span>
                    <p class="message-box">
                      {{$comment->text}}
                    </p>
                    <hr>
                </div>
              </div>
            </div>
                @endforeach

              </div>
            </div>
          </section>
        </div>

        <footer style="background-color: rgb(235, 234, 255);" class="border">
          <div id="footer" class="container text-center px-5 my-5">
            <ul class="nav	justify-content-center">
              <li class="nav-item">
                <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link text-dark" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="#">About</a>
              </li> --}}
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

