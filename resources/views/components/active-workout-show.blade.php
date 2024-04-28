    <!-- This form is what is shown when workout data is available, is provided data object form the WorkoutShowController  -->
    <!-- And is present on the workout-overview view  -->


    @props(['workout', 'workoutDays'])

    <!-- Initalising a variable responsible for elegant handling of faliure with search results  -->


    @if($workout)
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <!-- PHP section 1, Initalising a variable responsible for elegant handling of faliure with search results  -->

        @php
        $totalExerciseSearchResults = 0;
        @endphp

        <!-- Iteration of exercises assocated with the workout object -->
        <!-- $day represents the dayt, and $exercises rpresents the exercises associated with that day -->

        @foreach ($workout -> exercises -> groupBy('pivot.day') as $day => $exercises)

        <!-- PHP section 2, as required logic for variable incrementation -->
        @php
        $totalExerciseSearchResults += count($exercises); // Incrementation of $totalExerciseSearchResult is used with handling 0 or less than 8 results for elegant report back

        @endphp

        <!-- This secton is resposinble for the display of the data within the workout data object  -->
        <div class="mx-auto max-w-3xl mb-8" style = "padding-bottom: 16px;">
            @if (count ($exercises) > 0)
            <!-- If we have more than 0 exercises, then:  -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <!-- Title space to represent day  -->
                <h2 class="text-xl font-semibold leading-7 text-white">Day {{ $day }}</h2>
                <ul role="list" class="divide-y divide-gray-800">
                    <!-- Iteration of exercises data, to ensure all workouts to users search yeilded are displayed  -->
                    @foreach ($exercises as $exercise)
                    <li class="flex justify-between gap-x-6 py-5 pb-20">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <!-- Name of exercise in data object  -->
                                <p class="text-sm font-semibold leading-6 text-white">{{ $exercise->name }}</p>
                                <!-- Description from seeder of exercise in data object  -->
                                <p class="mt-1 truncate text-xs leading-5 text-gray-400">{{ $exercise->description }}
                                </p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @endforeach

        <!-- If no 0 exercises were yielded  data, handle -->

        @if ( $totalExerciseSearchResults == 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Sorry, we could not find any suitable exercises, please try to broaden your search.
                    </div>
                </div>
            </div>
        </div>

        <!-- If lack of search results, handle so user knows why its short -->

        @elseif ($totalExerciseSearchResults < 8) <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Sorry, this is all we could find! Please try to broaden your search for a larger plan.
                    </div>
                </div>
            </div>
    </div>
    @endif
    </div>



    <!-- If no workout data, handle -->
    @else
    <x-no-workout />
    @endif