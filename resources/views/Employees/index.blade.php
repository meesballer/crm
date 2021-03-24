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
    .pull-right{
        margin-left:75%;
    }
    .heading{
        position: absolute;
        left: 160px;
        top: 100px;
    }
</style>
<div class="push-top">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif
    <div class="heading">
        <H1><BR>Medewerkers</H1>
    </div>
        <div class="pull-right">
            <a dusk="add-button" href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">Medewerker toevoegen</a>
        </div>
        <br>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Email</th>
            <th scope="col">Telefoon</th>
            <th scope="col">Bedrijf</th>
            <th class="text-center">Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employee as $employees)
            <tr>
                <td>{{$employees->firstname}}</td>
                <td>{{$employees->lastname}}</td>
                <td>{{$employees->email}}</td>
                <td>{{$employees->phone}}</td>
                <td>{{$employees->company->name}}</td>
                <td class="text-center">
                    <a dusk="edit-button" href="{{ route('employees.edit', $employees->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a dusk="show-button" href="{{ route('employees.show', $employees->id)}}" class="btn btn-primary btn-sm">Detail</a>
                    <form action="{{ route('employees.destroy', $employees->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</html>

