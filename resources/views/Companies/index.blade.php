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

        <div class="pull-right">
            <a href="{{ route('companies.create') }}" class="btn-common btn-add">Bedrijf toevoegen</a>
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
                        <a href="{{ route('companies.edit', $companies->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('companies.show', $companies->id)}}" class="btn btn-primary btn-sm">Detail</a>
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
