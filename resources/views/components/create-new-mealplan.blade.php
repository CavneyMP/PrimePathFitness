    <!-- Outer container, max width for mobile users -->
    <div class="mx-auto max-w-7xl">

            <div class="bg-gray-900 shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="sm:flex sm:items-start sm:justify-between">
                        <div>
                            <h3 class="text-base font-semibold leading-6 text-white">Create a new Meal Plann</h3>
                            <div class="mt-2 max-w-xl text-sm text-gray-300">
                                <p>You can now generate your peronalised Meal Plans, these plan will be adjusted based on your indivual calaric and macro requirements.</p>
                            </div>
                        </div>
                        <div class="mt-5 sm:ml-6 sm:mt-0 sm:flex sm:flex-shrink-0 sm:items-center pt-4">
                        <a href="{{ route ('mealplan-create') }}" class="inline-flex items-center">
                            <button type="button"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                                plan</button>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
    </div> <!-- end outer container -->