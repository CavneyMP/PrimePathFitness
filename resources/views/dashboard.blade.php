<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


        <!-- Welcome message -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Welcome back,") }} {{ auth()->user()->name }}!

                </div>
            </div>
        </div>
    </div>

        <!-- Stats Grid -->
    <x-stats-grid/>

            <!-- Site Area Blocks -->
    <x-site-area-triple-block/>


</x-app-layout>
