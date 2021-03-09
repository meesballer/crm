@include('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<div class="container mt-5">

    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <form action="" method="post" action="{{ route('employees.store') }}">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf

        <div class="form-group">
            <label>Voornaam</label>
            <input type="text" class="form-control" name="firstname" id="firstname">
        </div>

        <div class="form-group">
            <label>Achternaam</label>
            <input type="text" class="form-control" name="lastname" id="lastname">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>

        <div class="form-group">
            <label>Subject</label>
            <input type="text" class="form-control" name="subject" id="subject">
        </div>

        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" name="message" id="message" rows="4"></textarea>
        </div>

        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
</div>
</body>

</html>
