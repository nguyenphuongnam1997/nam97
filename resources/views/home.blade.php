<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{URL::asset('public/images/logo.png')}}">
    <link rel="stylesheet" href="{{URL::asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/frontend/css/homeInterface.css')}}">
    <title>Nguyen Phuong Nam</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <img src="{{URL::asset('public/images/book20.png')}}" alt="">
            </div>
            <div class="col-sm-4">
                <img src="{{URL::asset('public/images/name14.png')}}" alt="">
                <a href="{{URL::asset(route('login'))}}">ĐĂNG NHẬP</a>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('public/bootstrap/js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('public/bootstrap/js/bootstrap.min.js')}})"></script>
</body>
</html>
