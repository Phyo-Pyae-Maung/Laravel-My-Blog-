<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid font-monospace" style="background-color: rgb(38, 36, 66);">
        <div class="row">
            <div class="col-md-12 d-flex flex-column justify-content-center align-items-center"  style="height: 100vh">
                @if(session()->has('msg'))
                <div if class="alert alert-danger col-4  ">
                    <span>{{session()->get('msg')}}</span>
                    <button data-bs-dismiss="alert" class="btn btn-close float-end"></button>
                </div>
                @endif
                <div class="card shadow col-4" style="background-color: rgb(235, 234, 255);">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" style="background-color: rgb(182, 180, 220);">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" value="{{old('password')}}" class="form-control" style="background-color: rgb(182, 180, 220);">
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
    
                            <button class="btn text-white shadow" style="background-color: rgb(38, 36, 66);">Log In</button>
                            <a class="d-flex float-end" href="{{url('/register')}}">sign up here</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
