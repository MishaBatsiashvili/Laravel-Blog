<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                    {{ $category->name }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="px-3 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
            {{ $category->slug }}
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}" class="inline-block text-cyan-500 hover:text-cyan-600">Edit</a>
        <form action="{{ route('admin.category.destroy', ['category' => $category->id]) }}" method="POST" class="inline-block">
            @method('delete')
            @csrf
            <button class="inline-block ml-3 text-rose-500 hover:text-rose-600">Delete</button>
        </form>
    </td>
</tr>
