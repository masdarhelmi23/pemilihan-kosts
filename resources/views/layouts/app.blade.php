<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kost Showcase')</title>
    <link href="{{ asset('bulma/css/bulma.min.css') }}" rel="stylesheet">
</head>
<body>
    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>
</body>
</html>
