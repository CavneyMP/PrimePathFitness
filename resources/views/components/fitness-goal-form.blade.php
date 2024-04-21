<!-- Outer container, max width for mobile users -->
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-4">
    <!-- Inner container with reduced max width -->
    <div class="mx-auto max-w-3xl">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <!-- Form for submitting fitness goal -->
            <form action="{{ route('metrics.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Form title -->
                <h2 class="text-xl font-semibold leading-7 text-white">Fitness Goal</h2>
                <!-- Description below the title -->
                <p class="text-gray-300">Select your weight loss goal to tailor your fitness plan.</p>
                
                <!-- Dropdown for selecting the type of weight loss -->
                <div class="grid grid-cols-1 gap-y-6">
                    <div>
                        <label for="weight_loss_type" class="block text-sm font-medium text-gray-300">Weight Loss Type</label>
                        <select id="weight_loss_type" name="weight_loss_type" autocomplete="weight_loss_type"
                                class="mt-1 block w-full rounded-md bg-gray-700 border-transparent focus:border-gray-600 focus:bg-gray-600 focus:ring-0 text-white">
                            <option value="mild">Intensive Weight Loss</option>
                            <option value="moderate">Moderate Weight Loss</option>
                            <option value="moderate">Maintain</option>
                            <option value="intensive">Moderate Muscle gain</option>
                            <option value="extreme">Extreme Muscle gain</option>
                        </select>
                    </div>
                </div>
                
                <!-- Buttons for resetting the form or submitting it -->
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
