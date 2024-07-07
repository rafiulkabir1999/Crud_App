<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}

     <!-- Link Bootstrap CSS -->
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <!-- Additional CSS -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body style=" margin:0 auto" class="bg-dark">
    {{-- <h1 style="text-align:center;padding:20px;color:white" class="bg-primary color-primary">This is Header</h1> --}}
    @include('common.header')
    <div class="bg-light">
     @yield('content')
    </div>
    <div class="bg-secondary p-2 text-light ">
        <p style="text-align:center">This is Footer</p>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Additional scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>