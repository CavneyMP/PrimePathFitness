<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Welcome back,") }} {{ auth()->user()->name }}!

                </div>
            </div>
        </div>
    </div>

    <x-stats-grid/>

    <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex -mx-4">
      <div class="w-1/3 px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
            Workout Plan
          </div>
        </div>
      </div>
      <div class="w-1/3 px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
            Meal Plan
          </div>
        </div>
      </div>
      <div class="w-1/3 px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
            Metrics
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</x-app-layout>
