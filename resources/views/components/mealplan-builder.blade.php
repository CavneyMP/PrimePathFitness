<!-- Outer container, max width for mobile users -->
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-4">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('mealplan-create.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Form Title -->
            <h2 class="text-xl font-semibold leading-7 text-white">Create a custom Meal Plan</h2>
            <p class="text-gray-300">Please select three meals, we'll do the rest.</p>

            <!-- Dynamic recipe loading by meal type -->
            @foreach(['breakfast', 'lunch', 'dinner'] as $mealType)
            <h2 class="text-xl font-semibold leading-7 text-white">{{ ucfirst($mealType) }} Recipes</h2>
            <ul role="list" class="divide-y divide-white/5">
                @foreach(App\Models\Recipe::where('mealtype', $mealType)->get() as $recipe)
                <li class="py-4">
                    <div class="flex items-center justify-between">
                        <!-- Recipe name and description -->
                        <div class="flex-auto">
                            <h3 class="text-sm font-semibold leading-6 text-white">{{ $recipe->name }}</h3>
                            <p class="mt-3 truncate text-sm text-gray-500">{{ $recipe->description }}</p>
                        </div>
                        <!-- Check box for each recipe -->
                        <div class="flex-none">
                            <input type="checkbox" name="recipes[]" value="{{ $recipe->id }}"
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @endforeach
            <!-- Form Submission -->
            <div class="flex justify-end gap-x-6">
                <button type="reset"
                    class="text-sm font-semibold text-gray-300 bg-gray-600 py-2 px-4 rounded-md hover:bg-gray-500">Reset</button>
                <button type="submit"
                    class="text-sm font-semibold text-black bg-indigo-600 py-2 px-4 rounded-md hover:bg-indigo-500">Submit</button>
            </div>
        </form>
    </div>
</div>