<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-buttons.primary href="{{ route('home') }}" class="mb-4">
                Back to Posts
            </x-buttons.primary>
            <div class="mt-10">
                <div class="px-20">
                    <h1 class="text-6xl font-medium leading-normal mb-8">{{ $post->title }}</h1>
                    <div class="flex items-center text-gray-600 font-medium mb-12">
                        <a
                            href="?author={{ $post->author->username }}"
                            class="flex items-center group"
                        >
                            <img
                                src="{{ asset('/storage/'.$post->author->image) }}"
                                alt="{{ $post->author->name }}"
                                class="object-cover w-7 h-7 block rounded-lg"
                            >
                            @if(request()->user()?->id === $post->author->id)
                            <p class="block ml-3">by <span class="group-hover:text-orange-600 transition-colors">You</span></p>
                            @else
                            <p class="block ml-3">by <span class="group-hover:text-orange-600 transition-colors">{{ ucwords($post->author->name) }}</span></p>
                            @endif
                        </a>

                        <div class="ml-4">
                        @if(request()->user()?->id && request()->user()->id !== $post->author->id)
                            @if(request()->user()->isFollowing($post->author))
                            <form action="{{ route('follow', ['user' => $post->author->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <x-buttons.secondary class="rounded-lg">
                                    Unfollow
                                </x-buttons.secondary>
                            </form>
                            @else
                            <form action="{{ route('follow', ['user' => $post->author->id]) }}" method="post">
                                @csrf
                                <x-buttons.primary>
                                    Follow
                                </x-buttons.primary>
                            </form>
                            @endif
                        @endif
                        </div>

                        <span class="block mx-4">-</span>

                        <div>{{ $post->publish_time }}</div>
                    </div>
                </div>

                <div class="pb-[50%] relative mb-10">
                    <img
                        src="{{ asset('/storage/'.$post->thumbnail) }}"
                        alt="post"
                        class="absolute top-0 left-0 w-full h-full object-cover"
                    >
                </div>

                <div class="px-20 sm:rounded-lg">
                    {{-- <div class="text-center pb-6 mb-6 border-b">

                        <a href="/?author={{ $post->author->username }}" class="inline-block text-sm text-cyan-500 hover:underline mb-2">Author: {{ $post->author->name }}</a>

                        @if(isset($isBookmarked) && $isBookmarked)
                        <form method="post" action="{{ route('bookmarks.destroy', ['id' => $post->id]) }}">
                            @csrf
                            @method('delete')
                            <button>Remove from Bookmarks</button>
                        </form>
                        @else
                        <form method="post" action="{{ route('bookmarks.store', ['post_id' => $post->id]) }}">
                            @csrf
                            <button>Add to Bookmarks</button>
                        </form>
                        @endif

                        <div><small class="text-gray-500">Views: {{ $post->viewsCount() }}</small></div>
                    </div> --}}
                    <div class="blog-post-body">{!! $post->body !!}</div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
