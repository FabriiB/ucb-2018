@extends('layouts.app')
@section('title', 'Usuarios')


@section('content')
    <h2>{{ $title1 }}</h2>

    <ul>
        @forelse ($users as $user)
            <li>{{ $user->id_user }} {{ $user->firs_name }} {{$user->last_name1}} {{$user->last_name1}}, {{ $user->email }}
                <img src="/storage/{{$user->photo}}" height="50" width="50">
                <form method="POST" action="/usuarios/{{$user->id_user}}" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <div class="form-group d-inline-block" >
                        <input type="submit" class="btn btn-danger delete-user" value="Delete user">
                    </div>
                </form></li>
        @empty
            <li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
    {{ $users->links() }}

@endsection

@section('sidebar')
    @parent
@endsection
