@extends('User.manageAdmin')
@section('myAccount')
    <a href="{{URL::asset(route('addCategory'))}}" type="button" class=" mt-5 mb-3 btn btn-block btn-success float-right">Add Category</a>
<table class="table mt-0">
    <thead class="table-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Created</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        @foreach($categorybooks as $categorybook)
        <tr>
            <th scope="row">
                {{ $i++}}
            </th>
            <td>{{$categorybook->category}}</td>
            <td>{{$categorybook->description}}</td>
            <td>{{$categorybook->created_at}}</td>
            <td>
                <a href="{{URL::asset(route('editCategory',['id' => $categorybook->id ]))}}" class="btn btn-success" role="button">Edit</a>
                <a href="{{URL::asset(route('deleteCategory',['id' => $categorybook->id ]))}}" class="btn btn-danger" role="button">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $categorybooks->links() }}
<style>
    .w-5{
        display: none;
    }
</style>
@if(Session::has('messagecategory'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messagecategory')}}
</span>
@endif
@if(Session::has('messagedeletecategory'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messagedeletecategory')}}
</span>
@endif
@if(Session::has('messageeditcategory'))
<span class="alert alert-success" style="position: absolute ; z-index:3 ; width:36% ; left:32% ; text-align: center">
    {{session::get('messageeditcategory')}}
</span>
@endif
@endsection
