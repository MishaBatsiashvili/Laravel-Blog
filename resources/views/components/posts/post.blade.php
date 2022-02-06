<div class="lg:w-1/2 w-full lg:odd:pr-12 lg:even:pl-12 pb-10 flex flex-col justify-between">
    <a href={{ route('posts.show', ['post' => $post->id]) }} class="block w-full hover:-translate-y-1 transition-transform duration-500">
        <div class="pb-[50%] relative">
            <img
                src="{{ asset('/storage/'.$post->thumbnail) }}"
                alt="post"
                class="absolute top-0 left-0 w-full h-full object-cover grayscale hover:grayscale-0 transition-all"
            >
        </div>
    </a>
    <div class="py-5 h-full flex flex-col justify-between">
        <div>
            <span class="block font-medium text-gray-600">05 Dec, 2021</span>
            <a
                href={{ route('posts.show', ['post' => $post->id]) }}
                class="block text-3xl leading-snug font-[500] my-4 font-header text-black hover:text-orange-600 transition-colors"
            >
                <h1>{{ $post->title }}</h1>
            </a>
            <p class="text-md font-medium leading-[1.81] mb-6 text-gray-600">{{ $post->excerpt }}...</p>
        </div>

        <a
            href="?author={{ $post->author->username }}"
            class="flex items-center text-gray-600 group"
        >
            <img
                src="{{ asset('/storage/'.$post->author->image) }}"
                alt="{{ $post->author->name }}"
                class="object-cover w-7 h-7 block rounded-lg"
            >
            @if(request()->user()?->id === $post->author->id)
            <p class="block ml-3 font-medium">by <span class="group-hover:text-orange-600 transition-colors">You</span></p>
            @else
            <p class="block ml-3 font-medium">by <span class="group-hover:text-orange-600 transition-colors">{{ ucwords($post->author->name) }}</span></p>
            @endif
        </a>
    </div>
</div>
