@extends('roles::app')
@section('content')
    <h1>All Roles</h1>
    <div id="roles-table">
    @role('role.master')
        <h1>Hello from the admin</h1>
    @endrole
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
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td>{{ $role->description }}</td>
                        <td><a href="{{ route('roles.edit', $role) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST">
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