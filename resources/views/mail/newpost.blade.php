<x-mail-layout>
    @if(isset($name) && isset($post))
    <div class="p-5">
        <h1 class="font-bold text-lg">{{ $name }} just posted a new post</h1>
        <a
            class="py-1.5 px-4 text-sm bg-cyan-500 hover:bg-cyan-600 rounded-lg text-white transition"
            href={{ route('posts.show', ['post' => $post->id]) }}
        >
            Go to Post
        </a>
    </div>
    @else
    <h1>no data provided</h1>
@endif
</x-mail-layout>
