<div class="bg-gray-900">
    <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-sm font-medium leading-6 text-gray-400">BMR</p>
                <p class="mt-2 flex items-baseline gap-x-2">
                    <span
                        class="text-4xl font-semibold tracking-tight text-white">{{ optional ($metrics)->bmr ?? 'N/a' }}
                        kcal</span>
                </p>
            </div>
            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-sm font-medium leading-6 text-gray-400">Current weight / Target weight</p>
                <p class="mt-2 flex items-baseline gap-x-2">
                    <span class="text-4xl font-semibold tracking-tight text-white">65</span>
                    <span class="text-sm text-gray-400">kg</span>
                    <span class="text-4xl font-semibold tracking-tight text-white">/ 70</span>
                    <span class="text-sm text-gray-400">kg</span>
                </p>
            </div>
            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-sm font-medium leading-6 text-gray-400">BMI</p>
                <p class="mt-2 flex items-baseline gap-x-2">
                    <span
                        class="text-4xl font-semibold tracking-tight text-white">{{ is_null($metrics) ? 'N/A' : round($metrics->bmi) ?? 'N/a' }}
                    </span>
                </p>
            </div>
            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-sm font-medium leading-6 text-gray-400">Daily Maintaince Kcald</p>
                <p class="mt-2 flex items-baseline gap-x-2">
                    <span
                        class="text-4xl font-semibold tracking-tight text-white">{{ optional ($metrics)->tdee ?? 'N/a' }}
                        Kcal</span>
                </p>
            </div>
        </div>
    </div>
</div>