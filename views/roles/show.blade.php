@extends('roles::app')
@section('content')
    <h1>Role Detail</h1>
    <p><b>Name:</b> {{ $role->name }}</p>
    <p><b>Slug:</b> {{ $role->slug }}</p>
    <p><b>Description:</b> {{ $role->description }}</p>
@endsection