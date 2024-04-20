<div>
    @if($workout)
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 px-4 pt-4">
            <div class="mx-auto max-w-3xl">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold leading-7 text-white">{{ $workout->name }}</h2>
                    <p class="text-gray-300">{{ $workout->description }}</p>

                    <ul role="list" class="divide-y divide-gray-800">
                        @foreach ($workout->exercises as $exercise)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-white">{{ $exercise->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-400">{{ $exercise->description }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div> <!-- end outer container -->
            </div>
        </div>
    @else
        <p>No active workout available.</p>
    @endif
</div>
