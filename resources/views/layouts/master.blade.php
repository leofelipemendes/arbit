<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="site.css"/>
    </head>
    <body>
        <header>
            <h1>O header</h1>
        </header>
        <section class="content">
            @yield('content')
        </section>
        <script src="jquery-3.0.0.min.js"></script>
        <script src="site.js"></script>
    </body>
</html>