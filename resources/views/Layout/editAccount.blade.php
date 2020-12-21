@extends('User.manageAdmin')
@section('myAccount')
<form action="{{URL::asset(route('edit',['id' => $users->id]))}}" method="POST">
    @csrf
    <h1>FORM EDIT</h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{$users->username}}" required>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{$users->email}}" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Phone</label>
      <input type="text" class="form-control" name="phonenumber" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{$users->phone}}">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Address</label>
      <input type="test" class="form-control" name="address" id="exampleInputPassword1" placeholder="{{$users->address}}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
@endsection
