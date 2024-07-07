<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}

     <!-- Link Bootstrap CSS -->
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <!-- Additional CSS -->
     {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <title>Document</title>
</head>
<body style=" margin:0 auto" class="bg-dark">
    {{-- <h1 style="text-align:center;padding:20px;color:white" class="bg-primary color-primary">This is Header</h1> --}}
    @include('common.authHeader')
    <div>
     @yield('content')
    </div>
    <h1 class="bg-secondary" style="text-align:center; ;padding:20px;color:white">This is Footer</h1>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Additional scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>
</html>