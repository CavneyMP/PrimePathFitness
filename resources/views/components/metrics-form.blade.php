<!-- Outer container, max width for mobile users -->
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 px-4 pt-4">



    <!-- Outer container, max width for mobile users -->
    <div class="mx-auto max-w-3xl">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">

            <!-- Element -->
            <form action="{{ route('metrics.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- title -->
                <h2 class="text-xl font-semibold leading-7 text-white">User Metrics</h2>

                <!-- Description -->
                <p class="text-gray-300">Enter your personal metrics to track your fitness progress.</p>

                <div class="grid grid-cols-1 gap-y-6">
                    <div>
                        <label for="age" class="block text-sm font-medium text-gray-300">Age</label>
                        <input type="number" name="age" id="age" autocomplete="age"
                            class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                    </div>

                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-300">Weight (kg)</label>
                        <input type="number" step="0.1" name="weight" id="weight" autocomplete="weight"
                            class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                    </div>

                    <div>
                        <label for="height" class="block text-sm font-medium text-gray-300">Height (cm)</label>
                        <input type="number" step="0.1" name="height" id="height" autocomplete="height"
                            class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-300">Gender</label>
                        <select id="gender" name="gender" autocomplete="gender"
                            class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div>
                        <label for="activity_level" class="block text-sm font-medium text-gray-300">Activity
                            Level</label>
                        <select id="activity_level" name="activity_level" autocomplete="activity_level"
                            class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                            <option>Low</option>
                            <option>Moderate</option>
                            <option>High</option>
                            <option>Very High</option>
                        </select>
                    </div>

                    <!-- Dropdown for selecting the type of weight loss -->
                    <div class="grid grid-cols-1 gap-y-6">
                        <div>
                            <label for="goal_weight" class="block text-sm font-medium text-gray-300">Weight Loss
                                Type</label>
                            <select id="goal_weight" name="goal_weight" autocomplete="goal_weight"
                                class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                                <option value="intensive_loss">Intensive Weight Loss</option>
                                <option value="moderate_loss">Moderate Weight Loss</option>
                                <option value="maintain">Maintain</option>
                                <option value="moderate_gain">Moderate Muscle Gain</option>
                                <option value="extreme_gain">Extreme Muscle Gain</option>
                            </select>
                        </div>
                    </div>


                </div>


                <div class="flex justify-end gap-x-6">
                    <button type="reset"
                        class="text-sm font-semibold text-gray-300 bg-gray-600 py-2 px-4 rounded-md hover:bg-gray-500">
                        Reset
                    </button>
                    <button type="submit"
                        class="text-sm font-semibold text-white bg-indigo-600 py-2 px-4 rounded-md hover:bg-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </div>

    </div> <!-- end inner container -->


</div> <!-- end outer container -->