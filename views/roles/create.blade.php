@extends('roles::app')
@section('content')
    <form action="/roles" method="POST">
        Role name: <input type="text" name="name"><br>
        Role Slug: <input type="text" name="slug"><br>
        Role permissions:
        @foreach ($permissions as $permission)
            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}
        @endforeach
        <br>
        Role Description: <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Save">
    </form>
@endsection