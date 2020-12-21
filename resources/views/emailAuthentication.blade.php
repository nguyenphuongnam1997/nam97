<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{URL::asset('public/images/logo.png')}}">
    <link rel="stylesheet" href="{{URL::asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/frontend/css/registrationInterface.css')}}">
    <title>Nguyen Phuong Nam</title>
</head>

<body>
    <div class="interface">
        <img src="{{URL::asset('public/images/interface.jpg')}}" alt="" class="background">
        <img src="{{URL::asset('public/images/nguyenphuongnamLeft.png')}}" alt="" class="logo1">
        <img src="{{URL::asset('public/images/AT130632Right.png')}}" alt="" class="logo2">
        <div class="formRegistration">
            <h1>EMAIL AUTHENTICATION</h1>
            <h3>Số thứ tự : 27</h3>
            <form action="" method="POST">
                @csrf
                <label>Email*</label>
                <input type="email" name="Email" placeholder="Email">
                <button type="submit" name="Authentication" id="" class="btn btn-primary" >Authentication</button>
            </form>
            <div class="information">
                <a href="{{URL::asset(route('login'))}}">Cancel</a>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('public/bootstrap/js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('public/bootstrap/js/bootstrap.min.js')}})"></script>
</body>
</html>
