<html>

    @if(isset($head) && $head)
    <head>
        {{ $head }}
    </head>
    @endif

    <body class="font-sans antialiased">

        <div class="min-h-screen bg-white">
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
