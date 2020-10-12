<DOCTYPE HTML>
<html lang="ja">
    
<head>
    @include('layouts.head')
</head>

<body class="is-preload">

    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            @include('layouts.header')
        </header>

        @yield('content')

        <!-- Footer -->
        <footer id="footer">
            @include('layouts.footer')
        </footer>

    </div>

    @include('layouts.scripts')
    
</body>

</html>