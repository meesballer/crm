@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bedrijf.</h2>
            </div>
            <br>
            <div class="pull-right">
                <a dusk="add-button"  href="{{ route('companies.add', $company->id) }}" class="btn btn-primary btn-sm">Medewerker toevoegen</a>
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
            <th>naam</th>
            <th>Email</th>
            <th>Adres</th>
            <th>Website</th>
            <th width="280px">Actie</th>
        </tr>
        @foreach($company as $companies)
            <tr>
                <td>{{$companies->name}}</td>
                <td>{{$companies->email}}</td>
                <td>{{$companies->address}}</td>
                <td>{{$companies->website}}</td>

                <td class="text-center">
                    <a dusk="edit-button" href="{{ route('companies.edit', $companies->id)}}" class="btn btn-primary btn-sm">Bewerken</a>
                    <a dusk="show-button" href="{{ route('companies.show', $companies->id)}}" class="btn btn-primary btn-sm">Detail</a>
                    <form action="{{ route('companies.destroy', $companies->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
        <table class="table table-bordered">
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Telefoon</th>
                <th>Bedrijf</th>
                <th width="280px">Actie</th>
            </tr>
            @foreach($employees as $employee)
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
           @endforeach
        </table>

{{--    {!! $company->render() !!}--}}


@endsection

