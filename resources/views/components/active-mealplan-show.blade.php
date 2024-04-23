@if(isset($mealPlan) && $mealPlan->groupedRecipes)
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-4">
    <div class="flex justify-between flex-wrap">
    @foreach($recipes as $recipe)
        <!-- Begin Meal Card for Recipe -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg m-2 flex-grow">
            <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:px-6 shadow-lg rounded-lg">
                <div class="flex items-center justify-between -mt-2 -ml-4 sm:flex-nowrap">
                    <h3 class="text-base font-semibold leading-6 text-white ml-4 mt-2">{{ $recipe->name }}</h3>
                    <button type="button"
                        class="relative inline-flex items-center rounded-md bg-indigo-600 dark:bg-indigo-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 dark:hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ml-4 mt-2 flex-shrink-0">Create
                        XXX</button>
                </div>
            </div>

            <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-900 overflow-hidden bg-white dark:bg-gray-800 shadow-sm dark:ring-1 dark:ring-gray-900/5 sm:rounded-xl mt-4">
                @foreach($recipe->ingredients as $ingredient)
                <li class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 dark:hover:bg-gray-700 sm:px-6">
                    <div class="flex gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-white">
                                {{ $ingredient->name }}: {{ $ingredient->pivot->adjusted_quantity }} grams
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- End Meal Card for Recipe -->
        @endforeach
    </div>
</div>
@endif
