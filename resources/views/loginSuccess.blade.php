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
                        <a href="{{URL::asset(route('changePass'))}}" class="myDepartment">Thay đổi mật khẩu</a>
                    </div>
                    <div aria-labelledby="section1HeaderId" >
                        <a href="{{URL::asset(route('loginSuccess'))}}" class="myDepartment">Thư viện sách</a>
                    </div>
                    <div aria-labelledby="section1HeaderId" >
                        <a href="{{URL::asset(route('listBorrow'))}}" class="myDepartment">Phiếu mượn</a>
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
            <form action="{{URL::asset(route('searchSubmit'))}}" method="post" class="form-inline" style="margin-bottom: 50px;margin-top: 60px">
                @csrf
                    <div class="form-group">
                      <input type="text" name="search" id="" class="form-control" placeholder="Search name book" style="width: 500px;">
                      <button type="submit" class="btn btn-primary" style="width: 100px;margin-left: 20px">Search</button>
                      @if(Session::has('messageSearch'))
                      <span class="alert alert-danger" style="position: absolute ; z-index:3 ; width:36% ; left:60% ; text-align: center">
                          {{session::get('messageSearch')}}
                      </span>
                      @endif
                    </div>

                </form>
                <table class="table mt-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Bookname</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Unitprice</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        @foreach($books as $book)
                        <tr>
                            <th scope="row">
                                {{ $i++}}
                            </th>
                            <td>{{$book->bookname}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->category->category}}</td>
                            <td>{{$book->description}}</td>
                            <td>{{$book->amount}}</td>
                            <td>{{$book->unitprice}}</td>
                            <td>
                                <a href="{{URL::asset(route('borrowBook',['id' => $book->id ]))}}" class="btn btn-success" role="button">Borrow</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $books->links() }}
                <style>
                    .w-5{
                        display: none;
                    }
                </style> --}}
                @if(Session::has('messageBorrowBook'))
                <span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
                    {{session::get('messageBorrowBook')}}
                </span>
                @endif

                <div style="position: absolute;bottom: 0;left: 45%;">
                    <p>Copyright NguyenPhuongNam</p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('public/bootstrap/js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
