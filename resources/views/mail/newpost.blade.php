<x-mail-layout>

    <x-slot name="head">
        <head>
            <style>
                body {
                    color: black;
                    font-family: Helvetica, sans-serif
                }

                h1 {
                }

                .text-yellow {
                    color: red !important;
                    font-family: 'Work Sans', sans-serif;
                }

            </style>
        </head>
    </x-slot>

    @if(isset($name) && isset($post))
    <div class="p-5">
        <h1>{{ $name }} just published a new post!</h1>
        <a
            class="text-yellow"
            href={{ route('posts.show', ['post' => $post->id]) }}
        >
            Go to Post
        </a>
    </div>
    @else
    <h1>no data provided</h1>
@endif
</x-mail-layout>
