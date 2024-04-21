<!-- Outer container, max width for mobile users -->
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-4">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('workout-create.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Form Title -->
            <h2 class="text-xl font-semibold leading-7 text-white">Customize Your Workout Plan</h2>
            <p class="text-gray-300">Select your preferences to generate a tailored workout plan.</p>

            <!-- name and desc Text Fields -->
            <div class="grid grid-cols-1 gap-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                    <input type="text" name="name" id="name" autocomplete="name"
                        class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
                    <input type="text" name="description" id="description" value="My Custom Plan"
                        class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                </div>


                <h2 class="text-xl font-semibold leading-7 text-white">Breakfast Recipes</h2>

                <ul role="list" class="divide-y divide-white/5">
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                            <time datetime="2023-01-23T11:00" class="flex-none text-xs text-gray-500">1h</time>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                            <time datetime="2023-01-23T09:00" class="flex-none text-xs text-gray-500">3h</time>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>

                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                </ul>

                <h2 class="text-xl font-semibold leading-7 text-white">Lunch Recipes</h2>

                <ul role="list" class="divide-y divide-white/5">
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>

                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                </ul>

                <h2 class="text-xl font-semibold leading-7 text-white">Dinners Recipes</h2>

                <ul role="list" class="divide-y divide-white/5">
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>

                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">$recipe
                            </h3>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">$RecipeDescritpion</p>
                    </li>
                </ul>
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