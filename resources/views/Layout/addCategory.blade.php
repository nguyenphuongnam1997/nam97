<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{URL::asset('public/images/logo.png')}}">
    <link rel="stylesheet" href="{{URL::asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/frontend/css/manageAdmin.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/frontend/css/registrationInterface.css')}}">
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
                        <a href="{{URL::asset('/logout')}}" class="myDepartment">Thoát</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div style="text-align: center">
                    <h2>NGUYEN PHUONG NAM-AT130632-STT:27</h2>
                </div>
                <form action="{{URL::asset(route('addCategory'))}}" method="POST">
                    @csrf
                    <h1 style="text-align: center;margin-top: 50px">FORM ADD CATEGORY</h1>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <input type="test" class="form-control" name="category" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Category" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <input type="test" class="form-control" name="description" id="exampleInputPassword1" placeholder="Description" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('public/bootstrap/js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
