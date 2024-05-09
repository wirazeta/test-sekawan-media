<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('build/assets/app-D-sv12UV.css') }}" rel="stylesheet">
</head>
<body class="vh-100">
    @yield('content')

    <script src="{{ asset('build/assets/app-Cl1Bgkaz.js') }}" defer></script>
    @yield('custom-script')
</body>
</html>
