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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <div class="heading">
        <H1><BR>Bedrijven</H1>
    </div>
    <div class="pull-right">
        <a dusk="add-button"  href="{{ route('companies.create') }}" class="btn btn-primary btn-sm">Bedrijf toevoegen</a>
    </div>
    <br>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Email</th>
            <th scope="col">Adres</th>
            <th scope="col">Website</th>
            <th class="text-center">Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach($company as $companies)
            <tr>
                <td>{{$companies->name}}</td>
                <td>{{$companies->email}}</td>
                <td>{{$companies->address}}</td>
                <td>{{$companies->website}}</td>
                <td class="text-center">
                    @can('company-edit')
                    <a dusk="edit-button" href="{{ route('companies.edit', $companies->id)}}" class="btn btn-primary btn-sm">Bewerken</a>
                    @endcan
                    @can('company-edit')
                    <a dusk="show-button" href="{{ route('companies.show', $companies->id)}}" class="btn btn-primary btn-sm">Detail</a>
                    @endcan
                    @can('company-delete')
                    <form action="{{ route('companies.destroy', $companies->id)}}" method="post" style="display: inline-block">

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
