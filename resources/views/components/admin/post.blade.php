<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div>
                <a
                    href="{{ route('posts.show', ['post' => $post->id]) }}"
                    class="text-sm font-medium text-gray-900 flex items-center group"
                >
                    <i data-feather="eye" class="w-4 h-4 group-hover:scale-125 transition-transform"></i>
                    <span class="inline-block ml-3 group-hover:text-orange-600 transition-colors">
                        @if(strlen($post->title) > 30)
                        {{ substr($post->title, 0, 30) . '...' }}
                        @else
                        {{ $post->title }}
                        @endif
                    </span>
                </a>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if($post->status === 1)
        <x-admin.status.base preset="success">Published</x-admin.status.base>
        @else
        <x-admin.status.base preset="secondary">Draft</x-admin.status.base>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if($post->category?->name)
        <x-admin.status.base preset="primary">{{ $post->category->name }}</x-admin.status.base>
        @else
        <x-admin.status.base preset="secondary">No Category</x-admin.status.base>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        @if(isset($isBookmark) && $isBookmark)
        <form action="{{ route('bookmarks.destroy', ['id' => $post->id]) }}" method="POST" class="inline-block">
            @method('delete')
            @csrf
            <button class="inline-block ml-3 text-rose-500 hover:text-rose-600">Delete from Bookmarks</button>
        </form>
        @else
        <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="text-gray-500 hover:text-gray-700">Edit</a>
        <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST" class="inline-block">
            @method('delete')
            @csrf
            <button class="inline-block ml-3 text-rose-500 hover:text-rose-600">Delete</button>
        </form>
        @endif
    </td>
</tr>
