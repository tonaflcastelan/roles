@extends('roles::app')
@section('content')
    <h1>All Permissions</h1>
    <div id="permissions-table">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th colspan="2">Actions</th>
            </tr>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->slug }}</td>
                        <td>{{ $permission->description }}</td>
                        <td><a href="{{ route('permissions.edit', $permission) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
                                @method('DELETE')
                                <button>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
    </div>
@endsection