@extends('roles::app')
@section('content')
    <h1>Edit Role</h1>
    <form action="{{ route('permissions.update', $permission) }}" method="POST">
    {{ method_field('PUT') }}
        Name: <input type="text" name="name" value="{{ $permission->name }}"><br>
        Slug: <input type="text" name="slug" value="{{ $permission->slug }}"><br>
        Description: <textarea name="description" cols="30" rows="10">{{ $permission->description }}</textarea><br>
        <input type="submit" value="Edit">
    </form>
@endsection