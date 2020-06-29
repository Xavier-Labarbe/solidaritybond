<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts/partials/_head')
</head>

<body>
    <header>
        @include('layouts/partials/_navbar')
        <br>
    </header>

    <main>
        @yield('main')
    </main>

    <footer id="footer">
            @include('layouts/partials/_footer')
    </footer>
</body>

</html>
