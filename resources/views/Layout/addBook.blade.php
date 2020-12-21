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
            <form action="{{URl::asset(route('addBook'))}}" method="POST">
                    @csrf
                    <h1 style="text-align: center;margin-top: 50px">FORM ADD BOOK</h1>
                <div class="row mb-4 ml-1">
                    <div class="col">
                        <input type="text" name="bookcode" class="form-control"  placeholder="book code" required>
                    </div>
                <div class="col">
                        <input type="text" name="bookname" class="form-control" placeholder="book name" required>
                </div>
        <div class="col">
            <input type="text" name="author" class="form-control" placeholder="author" required>
          </div>
      </div>
      <div class="row mb-4 ml-1">
        <div class="col">
          <input type="text" name="publishingyear" class="form-control"  placeholder="publishing year" required>
        </div>
        <div class="col">
          <input type="text" name="publishingcompany" class="form-control" placeholder="publishing company" required>
        </div>
        <div class="col">
            <select name="category_ID" class="form-control" >
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
          </div>
      </div>
      <div class="row mb-4 ml-1">
        <div class="col">
          <input type="text" name="description" class="form-control"  placeholder="description" required>
        </div>
        <div class="col">
          <input type="text" name="amount" class="form-control" placeholder="amount" required>
        </div>
        <div class="col">
            <input type="text" name="unitprice" class="form-control" placeholder="unit price" required>
          </div>
      </div>
    <button type="submit" name="" class="btn btn-primary">ADD BOOK</button>
  </form>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('public/bootstrap/js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
