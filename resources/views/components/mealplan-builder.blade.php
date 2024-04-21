<!-- Outer container, max width for mobile users -->
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-4">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('workout-create.store') }}" method="POST" class="space-y-6">
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
                <ul role="list" class="divide-y divide-white/5">
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" class="h-6 w-6 flex-none rounded-full bg-gray-800">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">Michael Foster
                            </h3>
                            <time datetime="2023-01-23T11:00" class="flex-none text-xs text-gray-500">1h</time>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">Pushed to <span
                                class="text-gray-400">ios-app</span> (<span
                                class="font-mono text-gray-400">2d89f0c8</span> on <span
                                class="text-gray-400">main</span>)</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" class="h-6 w-6 flex-none rounded-full bg-gray-800">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">Lindsay Walton
                            </h3>
                            <time datetime="2023-01-23T09:00" class="flex-none text-xs text-gray-500">3h</time>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">Pushed to <span
                                class="text-gray-400">mobile-api</span> (<span
                                class="font-mono text-gray-400">249df660</span> on <span
                                class="text-gray-400">main</span>)</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" class="h-6 w-6 flex-none rounded-full bg-gray-800">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">Courtney Henry
                            </h3>
                            <time datetime="2023-01-23T00:00" class="flex-none text-xs text-gray-500">12h</time>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">Pushed to <span
                                class="text-gray-400">ios-app</span> (<span
                                class="font-mono text-gray-400">11464223</span> on <span
                                class="text-gray-400">main</span>)</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" class="h-6 w-6 flex-none rounded-full bg-gray-800">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">Courtney Henry
                            </h3>
                            <time datetime="2023-01-21T13:00" class="flex-none text-xs text-gray-500">2d</time>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">Pushed to <span
                                class="text-gray-400">tailwindui.com</span> (<span
                                class="font-mono text-gray-400">dad28e95</span> on <span
                                class="text-gray-400">main</span>)</p>
                    </li>
                    <li class="py-4">
                        <div class="flex items-center gap-x-3">
                            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" class="h-6 w-6 flex-none rounded-full bg-gray-800">
                            <h3 class="flex-auto truncate text-sm font-semibold leading-6 text-white">Michael Foster
                            </h3>
                            <time datetime="2023-01-18T12:34" class="flex-none text-xs text-gray-500">5d</time>
                        </div>
                        <p class="mt-3 truncate text-sm text-gray-500">Pushed to <span
                                class="text-gray-400">relay-service</span> (<span
                                class="font-mono text-gray-400">624bc94c</span> on <span
                                class="text-gray-400">main</span>)</p>
                    </li>
                </ul>
                <!-- Form Submission -->
                <div class="flex justify-end gap-x-6">
                    <button type="reset"
                        class="text-sm font-semibold text-gray-300 bg-gray-600 py-2 px-4 rounded-md hover:bg-gray-500">Reset</button>
                    <button type="submit"
                        class="text-sm font-semibold text-black bg-indigo-600 py-2 px-4 rounded-md hover:bg-indigo-500">Submit</button>
                </div>
        </form>
    </div>
</div>