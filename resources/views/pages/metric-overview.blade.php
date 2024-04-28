<x-app-layout>

<!-- Header slot, provides page title and breif info -->

<!-- Main page for metrics blade template -->

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Health Metrics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Health metrics based on your provided metrics, connect your whoop 4.0 to view more!
                </div>
            </div>
        </div>
    </div>

    <!-- X component that show connect to whoop redirect-->

    <x-connect-whoop />
</x-app-layout>
