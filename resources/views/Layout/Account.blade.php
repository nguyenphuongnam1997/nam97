@extends('User.manageAdmin')
@section('myAccount')

<a href="{{URL::asset(route('addAccount'))}}" type="button" class=" mt-5 mb-3 btn btn-block btn-success float-right">Add Account</a>
<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Created</th>
            <th scope="col">Authority</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach($users as $user)
        <tr>
            <th scope="row">
                {{ $i++}}
            </th>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phonenumber}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->role->name}}</td>
            <td>
                <a href="{{URL::asset(route('edit',['id' => $user->id ]))}}" class="btn btn-success" role="button">Edit</a>
                <a href="{{URL::asset(route('delete',['id' => $user->id ]))}}" class="btn btn-danger" role="button">Delete</a>
                <a href="{{URL::asset(route('editRole',['id' => $user->id ]))}}" class="btn btn-danger" role="button">Edit Role</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
<style>
    .w-5{
        display: none;
    }
</style>
@if(Session::has('messageAddAccount'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messageAddAccount')}}
</span>
@endif
@if(Session::has('messageEditAccount'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messageEditAccount')}}
</span>
@endif
@if(Session::has('messageDeleteAccount'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messageDeleteAccount')}}
</span>
@endif
@if(Session::has('messageEditRole'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messageEditRole')}}
</span>
@endif
@endsection
