@extends('User.manageAdmin')
@section('myAccount')
<form action="{{URL::asset(route('editCategory',['id' => $categories->id]))}}" method="POST">
    @csrf
    <h1 style="text-align: center;margin-top: 50px">FORM EDIT CATEGORY</h1>
    <div class="form-group">
      <label for="exampleInputEmail1">Category</label>
    <input type="test" class="form-control" name="category" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{$categories->category}}" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
    <input type="test" class="form-control" name="description" id="exampleInputPassword1" placeholder="{{$categories->description}}" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
