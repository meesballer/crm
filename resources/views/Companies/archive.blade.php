@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bedrijven beheer.</h2>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Creëer nieuw bedrijf.</a>
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
                    @can('company-edit')
                        <a dusk="edit-button" href="{{ route('companies.restore', $companies->id)}}" class="btn btn-primary btn-sm">Terugzetten</a>
                    @endcan
                    @can('company-delete')
                        <form action="{{ route('companies.delete', $companies->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>


    {!! $company->render() !!}



@endsection


