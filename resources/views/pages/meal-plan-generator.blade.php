<!-- Class not used in current dev -->

 
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meal Plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    View your current Meal Plan here!
                </div>
            </div>
        </div>
    </div>


    <x-active-mealplan-show :mealPlan="$mealPlan" :recipes="$recipes" />
    <x-active-mealplan-show :mealPlan="$mealPlan" :recipes="$recipes" />

</x-app-layout>
