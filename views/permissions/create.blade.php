@extends('roles::app')
@section('content')
    <form action="{{ route('permissions.store') }}" method="POST">
        Permission name: <input type="text" name="name"><br>
        Permission Slug: <input type="text" name="slug"><br>
        Permission Description: <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Save">
    </form>
@endsection