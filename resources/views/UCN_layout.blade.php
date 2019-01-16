<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('UCN_Head')
    @yield('head_content')
    <title>@yield('title') - Vinculacion UCN</title>
</head>

@yield('pre-body')

<body>
<header>
    @include('UCN_Header')
    @yield('header_content')
</header>
@yield('content')
</body>
</html>