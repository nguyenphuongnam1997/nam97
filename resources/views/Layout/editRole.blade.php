@extends('User.manageAdmin')
@section('myAccount')
<form action="{{URL::asset(route('editRole',['id' => $users->id]))}}" method="POST">
    @csrf
    <h1 style="text-align: center;margin-top: 50px">FORM EDIT ROLE</h1>
        <input type="hidden" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$users->username}}" required>
        <input type="hidden" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$users->email}}" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <input type="hidden" class="form-control" name="phonenumber" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$users->phone}}">
        <input type="hidden" class="form-control" name="address" id="exampleInputPassword1" placeholder="{{$users->address}}">
        <label for="exampleInputPassword1">Role</label>
        <select name="Role_id" class="form-control">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <p></p>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
