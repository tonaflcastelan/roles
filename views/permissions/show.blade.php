@extends('roles::app')
@section('content')
    <h1>Permission Detail</h1>
    <p><b>Name:</b> {{ $permission->name }}</p>
    <p><b>Slug:</b> {{ $permission->slug }}</p>
    <p><b>Description:</b> {{ $permission->description }}</p>
@endsection