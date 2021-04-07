@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gebruikers beheer.</h2>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Creëer nieuwe gebruiker</a>
            </div>
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Rollen</th>
            <th width="280px">Actie</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td class="text-center">
                    <a dusk="edit-button" href="{{ route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Bewerken</a>
                    <a dusk="show-button" href="{{ route('users.show', $user->id)}}" class="btn btn-primary btn-sm">Detail</a>
                    <form action="{{ route('users.destroy', $user->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $data->render() !!}



@endsection
