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
        <img src="{{URL::asset('public/images/1.jpg')}}" alt="" class="background">
        <img src="{{URL::asset('public/images/nguyenphuongnamLeft.png')}}" alt="" class="logo1">
        <img src="{{URL::asset('public/images/AT130632Right.png')}}" alt="" class="logo2">
        @if(Session::has('message'))
        <span class="alert alert-danger" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
            {{session::get('message')}}
        </span>
        @endif
        <div class="formRegistration">
            <h1>REGISTER</h1>
            <h3>Số thứ tự : 27</h3>
            <form action="{{URL::asset(route('registerSubmit'))}}" method="POST">
                @csrf
                <label>Username*</label>
                <input type="text" name="Username" placeholder="Username" required>
                <label>Password*</label>
                <input type="password" name="Password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=[\]{};':\\|,.>\/?]).{8,}" title="8 character or more,Uppercase,Lowercase,Integer,Special Characters">
                <label>Confirm Password*</label>
                <input type="password" name="Passauth" placeholder="Password Authentication" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=[\]{};':\\|,.>\/?]).{8,}" title="8 character or more,Uppercase,Lowercase,Integer,Special Characters">
                <label>Email*</label>
                <input type="email" name="Email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                <label>Phone Number</label>
                <input type="text" name="Phone" placeholder="Phone number">
                <label>Address</label>
                <input type="text" name="Address" placeholder="Address">
                <button type="submit" name="Register" id="" class="btn btn-primary" >Register</button>
            </form>
            <div class="information">
                <a href="{{URL::asset(route('login'))}}">Cancel</a>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('public/bootstrap/js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
