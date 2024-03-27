<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex flex-1">
            <div class="hidden lg:flex lg:gap-x-12">

                <!-- Conditional for not logged in users -->
                @if(!auth()->check()&& !request()->is('registration'))
                    <a href="/registration" class="text-sm font-semibold leading-6 text-gray-900">Register</a>
                @endif

                <a href="/contact-us" class="text-sm font-semibold leading-6 text-gray-900">Contact Us</a>
                <a href="/help" class="text-sm font-semibold leading-6 text-gray-900">Help</a>

                <!-- Conditional for logged in users and not on the home page -->
                @if(auth()->check() && !request()->is('home'))
                    <a href="/home" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
                @endif
            </div>

            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>
            </div>
        </div>

        @if(auth()->check())
            <!-- Displayed for logged in users -->
            <a href="/home" class="-m-1.5 p-1.5">
                <span class="sr-only"></span>
                <img class="h-8 w-auto" src="../../images/cvny.png" height="300px" width="250px"
                     class="img-fluid" alt="...">
            </a>
            <div class="flex flex-1 justify-end items-center">
        <li class="nav-item inline-block ml-10">
             @csrf
             <a href="/settings" class="text-sm font-semibold leading-6 text-gray-900">My Account</a>
        </li>
        <li class="nav-item inline-block ml-10">
            <form action="{{ route('logout') }}" method="GET">
                 @csrf
                <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Logout</button>
             </form>
        </li>

                </ul>
            </div>
        @else
            <!-- Displayed for not logged in users -->
            <div class="flex flex-1 justify-end items-center">
                <a href="/login" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></a>
            </div>
        @endif
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 left-0 z-10 w-full overflow-y-auto bg-white px-6 py-6">
            <div class="flex items-center justify-between">
                <div class="flex flex-1">
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                @if(!auth()->check())
                    <!-- Displayed for not logged in users -->
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="../../images/dene-fish.png" height="150px" width="150px"
                             class="img-fluid" alt="...">
                    </a>
                @endif
                <div class="flex flex-1 justify-end">
                    <!-- Displayed for not logged in users -->
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                                aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
            <div class="mt-6 space-y-2">
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
            </div>
        </div>
    </div>
</header>
</body>
</html>
