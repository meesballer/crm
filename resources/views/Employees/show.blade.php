@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Medewerker.</h2>
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
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Telefoon</th>
                <th>Bedrijf</th>
                <th width="280px">Actie</th>
            </tr>
            <tr>
                <td>{{$employee->firstname}}</td>
                <td>{{$employee->lastname}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->company->name}}</td>

                <td class="text-center">
                    @can('employee-list')
                        <a dusk="edit-button" href="{{ route('employees.edit', $employee->id)}}" class="btn btn-primary btn-sm">Bewerken</a>
                    @endcan
                    @can('employee-edit')
                        <a dusk="show-button" href="{{ route('employees.show', $employee->id)}}" class="btn btn-primary btn-sm">Detail</a>
                    @endcan
                    @can('employee-delete')
                        <form action="{{ route('employees.destroy', $employee->id)}}" method="post" style="display: inline-block">

                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
    </table>
    @endsection
