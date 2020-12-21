@extends('User.manageAdmin')
@section('myAccount')

<a href="{{URL::asset(route('addRole'))}}" type="button" class=" mt-5 mb-3 btn btn-block btn-success float-right">Add Role</a>
<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name Role</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach($roles as $role)
        <tr>
            <th scope="row">
                {{ $i++}}
            </th>
            <td>{{$role->name}}</td>
            <td>{{$role->description}}</td>
            <td>
                <a href="{{URL::asset(route('edit',['id' => $role->id ]))}}" class="btn btn-success" role="button">Edit</a>
                <a href="{{URL::asset(route('delete',['id' => $role->id ]))}}" class="btn btn-danger" role="button">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@if(Session::has('messageAddRole'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messageAddRole')}}
</span>
@endif
@endsection
