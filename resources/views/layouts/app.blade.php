<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-DX0kbOfJ.css') }}">
    <script src="{{ asset('build/assets/app-Dhio0ddA.js') }}"></script> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('student.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('jquery3.7.1.js') }}"></script>
    <title>CJS-SMS</title>
</head>

<body class="dark">
    @yield('content')
</body>

</html>
