@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Medewerkers beheer.</h2>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Creëer nieuwe Medewerker</a>
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
        @foreach($employee as $employees)
            <tr>
                <td>{{$employees->firstname}}</td>
                <td>{{$employees->lastname}}</td>
                <td>{{$employees->email}}</td>
                <td>{{$employees->phone}}</td>
                <td>{{$employees->company->name}}</td>

                <td class="text-center">
                    @can('employee-edit')
                        <a dusk="edit-button" href="{{ route('employees.restore', $companies->id)}}" class="btn btn-primary btn-sm">Terugzetten</a
                    @endcan
                    @can('employee-delete')
                        <form action="{{ route('employees.delete', $employees->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>


    {!! $employee->render() !!}



@endsection


