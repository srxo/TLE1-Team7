@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <table class="table">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Suspended</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->isAdmin ? 'Admin' : 'User' }}</td>
                    <td>{{ $user->is_suspended ? 'Yes' : 'No' }}</td>
                    <td>
                        <form action="{{ route('user.suspend', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('post')

                            <button type="submit" class="btn btn-warning">
                                {{ $user->is_suspended ? 'Unsuspend' : 'Suspend' }} User
                            </button>
                        </form>

                        @if (!$user->isAdmin)
                            <a href="{{ route('admin.makeAdmin', ['id' => $user->id]) }}" class="btn btn-success">Make Admin</a>
                        @else
                            <form action="{{ route('admin.removeAdmin', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove Admin</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
