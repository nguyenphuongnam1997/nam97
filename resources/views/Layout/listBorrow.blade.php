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
                <h2 style="text-align: center">BORROW BOOKS</h2>
                <table class="table mt-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Bookname</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        @foreach($borrows as $borrow)
                        <tr>
                            <th scope="row">
                                {{ $i++}}
                            </th>
                            <td>{{ $borrow->book->bookname}}</td>
                            <td>
                                @if($borrow->sendBook)
                                    <span>Đã gửi</span>
                                @else
                                    <span>Chưa gửi</span>
                                @endif
                            </td>
                            <td>
                                @if(!$borrow->sendBook)
                                <a href="{{URL::asset(route('deleteBookBorrow',['id' => $borrow->id ]))}}" class="btn btn-danger" role="button">Delete</a>
                                @endif
                                @if(!$borrow->sendBook)
                                    <a href="{{URL::asset(route('sendBorrowBook',['id' => $borrow->id ]))}}" class="btn btn-success" role="button">Send</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $borrows->links() }}
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
            </div>
            <div style="position: absolute;bottom: 0;left: 55%;">
                <p>Copyright NguyenPhuongNam</p>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('public/bootstrap/js/jquery-3.5.1.js')}}"></script>
    <script src="{{URL::asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
