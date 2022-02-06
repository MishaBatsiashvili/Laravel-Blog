<div class="w-full md:w-1/6 p-3">
    <div class="bg-white sm:rounded-lg shadow">

        <x-admin.sidebar-link
            name="Posts"
            :link="route('dashboard')"
            :active="request()->routeIs('dashboard')"
        />

        <x-admin.sidebar-link
            name="Categories"
            :link="route('admin.categories.index')"
            :active="request()->routeIs('admin.categories.index')"
        />

    </div>
</div>
