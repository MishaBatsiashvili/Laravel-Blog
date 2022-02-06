<div class="w-full {{ (isset($full) && $full) ? '' : 'md:w-5/6' }} p-3">
    <div class="flex flex-col">
        <div class="overflow-x-auto shadow sm:rounded-lg">
            <div class="align-middle inline-block min-w-full">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            {{ $slot }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
