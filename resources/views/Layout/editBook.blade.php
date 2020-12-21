@extends('User.manageAdmin')
@section('myAccount')
<form action="{{URL::asset(route('editBook',['id' => $books->id]))}}" method="POST">
    @csrf
    <h1 style="text-align: center;margin-top: 50px">FORM EDIT BOOK</h1>
<div class="row mb-4 ml-1">
    <div class="col">
    <input type="text" name="bookcode" class="form-control"  placeholder="{{$books->bookcode}}" required>
    </div>
<div class="col">
        <input type="text" name="bookname" class="form-control" placeholder="{{$books->bookname}}" required>
</div>
<div class="col">
<input type="text" name="author" class="form-control" placeholder="{{$books->author}}">
</div>
</div>
<div class="row mb-4 ml-1">
<div class="col">
<input type="text" name="publishingyear" class="form-control"  placeholder="{{$books->publishingyear}}">
</div>
<div class="col">
<input type="text" name="publishingcompany" class="form-control" placeholder="{{$books->publishingcompany}}">
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
<input type="text" name="description" class="form-control"  placeholder="{{$books->description}}">
</div>
<div class="col">
<input type="text" name="amount" class="form-control" placeholder="{{$books->amount}}" required>
</div>
<div class="col">
<input type="text" name="unitprice" class="form-control" placeholder="{{$books->unitprice}}" required>
</div>
</div>
<button type="submit" name="" class="btn btn-primary">ADD BOOK</button>
</form>
@endsection
