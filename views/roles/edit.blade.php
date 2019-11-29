@extends('roles::app')
@section('content')
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role) }}" method="POST">
    {{ method_field('PUT') }}
        Name: <input type="text" name="name" value="{{ $role->name }}"><br>
        Slug: <input type="text" name="slug" value="{{ $role->slug }}"><br>
        Role permissions:
        <br>
        @foreach ($permissions as $key => $permission)
            <input type="checkbox" name="permissions[]" value="{{$permission->id}}" {{in_array($permission->id, $assignedRoles) ? 'checked' : ''}}>{{ $permission->name }}<br>
        @endforeach
        <br>
        Description: <textarea name="description" cols="30" rows="10">{{ $role->description }}</textarea><br>
        <input type="submit" value="Edit">
    </form>
@endsection