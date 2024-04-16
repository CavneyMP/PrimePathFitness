<div class="bg-gray-900">
  <div class="mx-auto max-w-7xl">
    <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-2 lg:grid-cols-4">
      <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
        <p class="text-sm font-medium leading-6 text-gray-400">Days in a row</p>
        <p class="mt-2 flex items-baseline gap-x-2">
          <span class="text-4xl font-semibold tracking-tight text-white">9</span>
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
        <p class="text-sm font-medium leading-6 text-gray-400">height</p>
        <p class="mt-2 flex items-baseline gap-x-2">
          <span class="text-4xl font-semibold tracking-tight text-white">{{ $metrics->height ?? 'N/a' }} </span>
        </p>
      </div>
      <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
        <p class="text-sm font-medium leading-6 text-gray-400">Total Weight Lifted</p>
        <p class="mt-2 flex items-baseline gap-x-2">
          <span class="text-4xl font-semibold tracking-tight text-white">1,245kg</span>
        </p>
      </div>
    </div>
  </div>
</div>
