@include('layouts.app')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<style>
    .push-top {
        margin-top: 50px;
    }
    .table {
        width: 75%;
        max-width: 75%;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
        white-space: nowrap;
    }
</style>
<div class="row">

        <span class="pull-right">
            <a href="{{ route('companies.create') }}" class="btn btn-default btn-common btn-add">bericht toevoegen</a>
        </span>
</div>
<div class="push-top">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Adres</th>
            <th scope="col">Website</th>
            <th class="text-center">Actie</th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->address}}</td>
                <td>{{$company->website}}</td>
                <td class="text-center">
                    <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('companies.destroy', $company->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
        <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Naam</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            @foreach($employees as $employee)
            <td>{{$employee->firstname}}</td>
            @endforeach
        </tr>
        </tbody>
        </table>
</div>
</html>
