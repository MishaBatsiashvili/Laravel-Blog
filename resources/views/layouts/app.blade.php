<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&family=Work+Sans:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        @include('ckfinder::setup')
        <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header ?? '' }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @if(Session::has('success'))
            <x-notification.success
                title="{{ Session::get('success')['primary'] ?? '' }}"
                text="{{ Session::get('success')['secondary'] ?? '' }}"
            />
            @endif

        </div>





        <script>
            window.addEventListener('load', () => {
                const editorDOM = document.querySelector('#editor');
                ClassicEditor
                    .create( document.querySelector('#editor'), {
                        ckfinder: {
                            // Use named route for CKFinder connector entry point
                            uploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files&responseType=json'
                            // uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                        },
                        toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
                    })
                    .then( editor => {
                        editor.model.document.on( 'change:data', () => {
                            console.log(editor.getData());
                            editorDOM.innerHTML = editor.getData();
                        });
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            })
        </script>
    </body>
</html>
