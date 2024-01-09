@extends('layouts.app')

@section('content')
    <table class = "table">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acties</th>
        </tr>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->isAdmin ? 'Admin' : 'User' }}</td>
                <td>{{ $user->is_suspended }}</td>
                <td>
                    <form action="{{ route('user.suspend', ['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('post')

                        <button type="submit">
                            {{ $user->is_suspended ? 'Unsuspend' : 'Suspend' }} User
                        </button>
                    </form>

                    @if (!$user->isAdmin)
                        <a href="{{ route('admin.makeAdmin', ['id' => $user->id]) }}" class="btn btn-success">Make Admin</a>
                    @else
                        <form action="{{ route('admin.removeAdmin', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Remove Admin</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
