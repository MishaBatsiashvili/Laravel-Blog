<x-mail-layout>

    <x-slot name="head">
        <head>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500&family=Work+Sans:ital,wght@0,400;0,500;1,400;1,500&display=swap');

                h1 {
                    color: red;
                    font-family: 'Roboto Slab', serif;
                }

                .text-yellow {
                    color: yellow;
                    font-family: 'Work Sans', sans-serif;
                }

            </style>
        </head>
    </x-slot>

    @if(isset($name) && isset($post))
    <div class="p-5">
        <h1>{{ $name }} just posted a new post</h1>
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
