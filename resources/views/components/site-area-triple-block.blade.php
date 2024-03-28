<!-- Main content with boxes of equal length and better-sized images -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex space-x-4">
            <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center" style="height: 20vh;">
                    <div class="text-center">
                        
                        <img class="mx-auto h-12" 
                        src="{{ asset('images/workout.png') }}" 
                        alt="Workout Image">

                        <h3 class="text-sm mt-2 text-gray-900 dark:text-gray-100">{{ __('Workout Plan') }}</h3>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center" style="height: 20vh;">
                    <div class="text-center">

                        <img class="mx-auto h-12"
                        src="{{ asset('images/mealplan.png') }}"
                        alt="Meal Plan Image">

                        <h3 class="text-sm mt-2 text-gray-900 dark:text-gray-100">{{ __('Meal Plan') }}</h3>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 px-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center" style="height: 20vh;">
                    <div class="text-center">
                        
                    <img class="mx-auto h-12" 
                    src="{{ asset('images/mectric.png') }}" 
                    alt="Metric Image">
                    
                        <h3 class="text-sm mt-2 text-gray-900 dark:text-gray-100">{{ __('Metrics') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
