<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content=@yield('keywords')>
        <meta name="description" content=@yield('description')>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('/favicon.ico') }}" type="image/x-icon" rel="icon" />
        <!-- <link href="/css/app.css" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="{{ asset ('css/styles.css') }}"><!--[if lt IE 9]>
        <script src="../https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script><![endif]-->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        @yield('content')
    </body>
</html>