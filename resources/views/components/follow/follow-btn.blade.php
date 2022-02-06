{{-- @props(['post']) --}}
@if(auth()->user()?->isFollowing($post->author))
    <form action="{{ route('follow', ['user' => $post->author->id]) }}" class="ml-3" method="POST">
        @csrf
        @method('delete')
        <button class="inline-block py-1.5 px-4 text-sm bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-700 transition">Unfollow</button>
    </form>
@else
    <form action="{{ route('follow', ['user' => $post->author->id]) }}" class="ml-3" method="POST">
        @csrf
        <button class="inline-block py-1.5 px-4 text-sm bg-cyan-500 hover:bg-cyan-600 rounded-lg text-white transition">Follow</button>
    </form>
@endif
