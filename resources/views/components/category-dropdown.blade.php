<div>
    <select id="category_filter" name="category" class="w-full border-0 ring-0 focus:ring-1 focus:ring-orange-600 rounded-lg shadow transition">
        <option value="-1">All</option>
        @foreach ($categories as $cat)
        <option value="{{ $cat->slug }}" {{ $cat->slug == $currentCategory?->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
        @endforeach
    </select>
</div>
