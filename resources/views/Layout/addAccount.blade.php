<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{URL::asset('public/images/logo.png')}}">
    <link rel="stylesheet" href="{{URL::asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/frontend/css/manageAdmin.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/frontend/css/addAccount.css')}}">
    <title>Nguyen Phuong Nam</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="logo1">
                    <img src="{{URL::asset('public/images/nguyenphuongnamLeft.png')}}" alt="" >
                </div>
                <div id="accordianId"  aria-multiselectable="true" class="myMenu">
                    <div aria-labelledby="section1HeaderId" >
                        <a href="{{URL::asset(route('listUser'))}}" class="myDepartment">Quản lý tài khoản</a>
                    </div>
                    <div class="card">
                        <div id="section1HeaderId">
                        <button data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId" class="">
                          Quản lý sách
                        </button>
                        </div>
                        <div id="section1ContentId" class="collapse in" aria-labelledby="section1HeaderId" >
                            <a href="{{URL::asset(route('categoryBook'))}}" class="myDepartment">Thể loại sách</a>
                        </div>
                        <div id="section1ContentId" class="collapse in" aria-labelledby="section1HeaderId" >
                            <a href="{{URL::asset(route('listBook'))}}" class="myDepartment">Mục lục sách</a>
                        </div>
                    </div>
                    <div aria-labelledby="section1HeaderId" >
                        <a href="{{URL::asset('/')}}" class="myDepartment">Thoát</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div style="text-align: center">
                    <h2>NGUYEN PHUONG NAM-AT130632-STT:27</h2>
                </div>
                    @if(Session::has('message'))
                    <span class="alert alert-danger" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
                        {{session::get('message')}}
                    </span>
                    @endif
                    <div class="formRegistration">
                        <h1>FORM ADD ACCOUNT</h1>
                        <h3>Số thứ tự : 27</h3>
                        <form action="{{URL::asset(route('addAccount'))}}" method="POST">
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
                            <label>Role</label>
                            <select name="Role_id" class="form-control" style="border: 1px solid black">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" name="Register" id="" class="btn btn-primary" >ADD ACCOUNT</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="{{URL::asset('public/bootstrap/js/jquery-3.5.1.js')}}"></script>
<script src="{{URL::asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
