<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Videogames</title>
</head>

<body>
    <div class="container">
        <h1>
            @yield('titolo')
        </h1>
        @yield('backLink')
        @yield('contenuto')
    </div>

</body>

</html>
