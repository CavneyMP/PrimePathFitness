<!-- Outer container, max width for mobile users -->
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-4">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('workout.store') }}" method="POST" class="space-y-6">
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


            <!-- Equipment selection with checkboxes, multi-select -->
            <div class="grid grid-cols-1 gap-y-6">
                <fieldset>
                    <legend class="text-sm font-medium text-gray-300">Equipment (Select all that apply)</legend>
                    @foreach(['Dumbbells', 'Barbells', 'Bench', 'Pull-Up Bar', 'Cable Machine'] as $equipment)
                        <div class="mt-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="equipment[]" value="{{ $equipment }}" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <span class="ml-2 text-gray-300">{{ $equipment }}</span>
                            </label>
                        </div>
                    @endforeach
                </fieldset>

                <!-- Exercise Preferences with checkboxes, limited to 5 selections -->
                <fieldset>
                    <legend class="text-sm font-medium text-gray-300">Include in Generation</legend>
                    @foreach(['Compound Exercises', 'Calisthenics', 'Cable-Only Exercises', 'Dumbbell-Only Exercises', 'Bodyweight Exercises'] as $preference)
                        <div class="mt-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="preference[]" value="{{ $preference }}" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <span class="ml-2 text-gray-300">{{ $preference }}</span>
                            </label>
                        </div>
                    @endforeach
                </fieldset>

                <!-- Cardio Machines with checkboxes, limited to 5 selections -->
                <fieldset>
                    <legend class="text-sm font-medium text-gray-300">Cardio Machines</legend>
                    @foreach(['Treadmill', 'Stationary Bike', 'Elliptical Trainer', 'Rowing Machine', 'Stair Climber'] as $cardio)
                        <div class="mt-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="cardio[]" value="{{ $cardio }}" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <span class="ml-2 text-gray-300">{{ $cardio }}</span>
                            </label>
                        </div>
                    @endforeach
                </fieldset>

                <!-- Workout Split with dropdown, single select -->
                <div>
                    <label for="workout_split" class="block text-sm font-medium text-gray-300">Split (Select one)</label>
                    <select id="workout_split" name="workout_split" class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-black">
                        <option value="Full-Body">Full-Body</option>
                        <option value="Upper/Lower Body Split">Upper/Lower Body Split</option>
                        <option value="Push/Pull/Legs Split">Push/Pull/Legs Split</option>
                        <option value="Upper Body/Lower Body/Core Split">Upper Body/Lower Body/Core Split</option>
                    </select>
                </div>
            </div>

            <!-- Form Submission -->
            <div class="flex justify-end gap-x-6">
                <button type="reset" class="text-sm font-semibold text-gray-300 bg-gray-600 py-2 px-4 rounded-md hover:bg-gray-500">Reset</button>
                <button type="submit" class="text-sm font-semibold text-black bg-indigo-600 py-2 px-4 rounded-md hover:bg-indigo-500">Submit</button>
            </div>
        </form>
    </div>
</div>
