@extends('User.manageAdmin')
@section('myAccount')
    <a href="{{URL::asset(route('addBook'))}}" type="button" class=" mt-5 mb-3 btn btn-block btn-success float-right">Add Book</a>
<table class="table mt-0">
    <thead class="table-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Bookname</th>
            <th scope="col">author</th>
            <th scope="col">category</th>
            <th scope="col">description</th>
            <th scope="col">amount</th>
            <th scope="col">unitprice</th>
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
                <a href="{{URL::asset(route('editBook',['id' => $book->id ]))}}" class="btn btn-success" role="button">Edit</a>
                <a href="{{URL::asset(route('deleteBook',['id' => $book->id ]))}}" class="btn btn-danger" role="button">Delete</a>
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
@if(Session::has('messagebook'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messagebook')}}
</span>
@endif
@if(Session::has('messagedeletebook'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messagedeletebook')}}
</span>
@endif
@if(Session::has('messageeditbook'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messageeditbook')}}
</span>
@endif
@endsection
