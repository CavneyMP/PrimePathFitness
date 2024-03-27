@extends('layouts.layout')
@section('title', 'Home')
@section('content')

<div class="bg-white">
  <!--
    Mobile menu

    Off-canvas menu for mobile, show/hide based on off-canvas menu state.
  -->
  <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
    <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-black bg-opacity-25"></div>

    <div class="fixed inset-0 z-40 flex">
      <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
      <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
        <div class="flex px-4 pb-2 pt-5">
          <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Links -->
        <div class="mt-2">
          <div class="border-b border-gray-200">
            <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
              <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
              <button id="tabs-1-tab-1" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>
              <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
              <button id="tabs-1-tab-2" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
            </div>
          </div>

          <!-- 'Women' tab panel, show/hide based on tab state. -->
          <div id="tabs-1-panel-1" class="space-y-12 px-4 py-6" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
            <div class="grid grid-cols-2 gap-x-4 gap-y-10">
              <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  New Arrivals
                </a>
                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
              </div>
              <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Basic Tees
                </a>
                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
              </div>
              <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg" alt="Model wearing minimalist watch with black wristband and white watch face." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Accessories
                </a>
                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
              </div>
              <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg" alt="Model opening tan leather long wallet with credit card pockets and cash pouch." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Carry
                </a>
                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
              </div>
            </div>
          </div>
          <!-- 'Men' tab panel, show/hide based on tab state. -->
          <div id="tabs-1-panel-2" class="space-y-12 px-4 py-6" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
            <div class="grid grid-cols-2 gap-x-4 gap-y-10">
              <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg" alt="Hats and sweaters on wood shelves next to various colors of t-shirts on hangers." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  New Arrivals
                </a>
                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
              </div>
              <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg" alt="Model wearing light heather gray t-shirt." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Basic Tees
                </a>
                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
              </div>
              <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg" alt="Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Accessories
                </a>
                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
              </div>
              <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg" alt="Model putting folded cash into slim card holder olive leather wallet with hand stitching." class="object-cover object-center">
                </div>
                <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Carry
                </a>
                <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
              </div>
            </div>
          </div>
        </div>

        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
          </div>
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
          </div>
        </div>

        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
          </div>
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
          </div>
        </div>

        <div class="space-y-6 border-t border-gray-200 px-4 py-6">
          <!-- Currency selector -->
          <form>
            <div class="inline-block">
              <label for="mobile-currency" class="sr-only">Currency</label>
              <div class="group relative -ml-2 rounded-md border-transparent focus-within:ring-2 focus-within:ring-white">
                <select id="mobile-currency" name="currency" class="flex items-center rounded-md border-transparent bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-gray-700 focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-800">
                  <option>CAD</option>
                  <option>USD</option>
                  <option>AUD</option>
                  <option>EUR</option>
                  <option>GBP</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                  <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <header class="relative">
    <nav aria-label="Top">
      <!-- Top navigation -->
      <div class="bg-gray-900">
        <div class="mx-auto flex h-10 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
          <!-- Currency selector -->
          <form>
            <div>
              <label for="desktop-currency" class="sr-only">Currency</label>
              <div class="group relative -ml-2 rounded-md border-transparent bg-gray-900 focus-within:ring-2 focus-within:ring-white">
                <select id="desktop-currency" name="currency" class="flex items-center rounded-md border-transparent bg-gray-900 bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-white focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-100">
                  <option>CAD</option>
                  <option>USD</option>
                  <option>AUD</option>
                  <option>EUR</option>
                  <option>GBP</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                  <svg class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
            </div>
          </form>

          <div class="flex items-center space-x-6">
            <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Sign in</a>
            <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Create an account</a>
          </div>
        </div>
      </div>

      <!-- Secondary navigation -->
      <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <!-- Logo (lg+) -->
            <div class="hidden lg:flex lg:flex-1 lg:items-center">
              <a href="#">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
              </a>
            </div>

            <div class="hidden h-full lg:flex">
              <!-- Flyout menus -->
              <div class="inset-x-0 bottom-0 px-4">
                <div class="flex h-full justify-center space-x-8">
                  <div class="flex">
                    <div class="relative flex">
                      <!-- Item active: "text-indigo-600", Item inactive: "text-gray-700 hover:text-gray-800" -->
                      <button type="button" class="text-gray-700 hover:text-gray-800 relative flex items-center justify-center text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">
                        Women
                        <!-- Open: "bg-indigo-600", Closed: "" -->
                        <span class="absolute inset-x-0 -bottom-px z-20 h-0.5 transition duration-200 ease-out" aria-hidden="true"></span>
                      </button>
                    </div>

                    <!--
                      'Women' flyout menu, show/hide based on flyout menu state.

                      Entering: "transition ease-out duration-200"
                        From: "opacity-0"
                        To: "opacity-100"
                      Leaving: "transition ease-in duration-150"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="absolute inset-x-0 top-full z-10 bg-white text-sm text-gray-500">
                      <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                      <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>
                      <!-- Fake border when menu is open -->
                      <div class="absolute inset-0 top-0 mx-auto h-px max-w-7xl px-8" aria-hidden="true">
                        <!-- Open: "bg-gray-200", Closed: "bg-transparent" -->
                        <div class="bg-transparent h-px w-full transition-colors duration-200 ease-out"></div>
                      </div>

                      <div class="relative">
                        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                          <div class="grid grid-cols-4 gap-x-8 gap-y-10 py-16">
                            <div class="group relative">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center">
                              </div>
                              <a href="#" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                New Arrivals
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-cover object-center">
                              </div>
                              <a href="#" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                Basic Tees
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg" alt="Model wearing minimalist watch with black wristband and white watch face." class="object-cover object-center">
                              </div>
                              <a href="#" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                Accessories
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg" alt="Model opening tan leather long wallet with credit card pockets and cash pouch." class="object-cover object-center">
                              </div>
                              <a href="#" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                Carry
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flex">
                    <div class="relative flex">
                      <!-- Item active: "text-indigo-600", Item inactive: "text-gray-700 hover:text-gray-800" -->
                      <button type="button" class="text-gray-700 hover:text-gray-800 relative flex items-center justify-center text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">
                        Men
                        <!-- Open: "bg-indigo-600", Closed: "" -->
                        <span class="absolute inset-x-0 -bottom-px z-20 h-0.5 transition duration-200 ease-out" aria-hidden="true"></span>
                      </button>
                    </div>

                    <!--
                      'Women' flyout menu, show/hide based on flyout menu state.

                      Entering: "transition ease-out duration-200"
                        From: "opacity-0"
                        To: "opacity-100"
                      Leaving: "transition ease-in duration-150"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="absolute inset-x-0 top-full z-10 bg-white text-sm text-gray-500">
                      <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                      <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>
                      <!-- Fake border when menu is open -->
                      <div class="absolute inset-0 top-0 mx-auto h-px max-w-7xl px-8" aria-hidden="true">
                        <!-- Open: "bg-gray-200", Closed: "bg-transparent" -->
                        <div class="bg-transparent h-px w-full transition-colors duration-200 ease-out"></div>
                      </div>

                      <div class="relative">
                        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                          <div class="grid grid-cols-4 gap-x-8 gap-y-10 py-16">
                            <div class="group relative">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg" alt="Hats and sweaters on wood shelves next to various colors of t-shirts on hangers." class="object-cover object-center">
                              </div>
                              <a href="#" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                New Arrivals
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg" alt="Model wearing light heather gray t-shirt." class="object-cover object-center">
                              </div>
                              <a href="#" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                Basic Tees
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg" alt="Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body." class="object-cover object-center">
                              </div>
                              <a href="#" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                Accessories
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative">
                              <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg" alt="Model putting folded cash into slim card holder olive leather wallet with hand stitching." class="object-cover object-center">
                              </div>
                              <a href="#" class="mt-4 block font-medium text-gray-900">
                                <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                Carry
                              </a>
                              <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Company</a>
                  <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Stores</a>
                </div>
              </div>
            </div>

            <!-- Mobile menu and search (lg-) -->
            <div class="flex flex-1 items-center lg:hidden">
              <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
              <button type="button" class="-ml-2 rounded-md bg-white p-2 text-gray-400">
                <span class="sr-only">Open menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
              </button>

              <!-- Search -->
              <a href="#" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Search</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
              </a>
            </div>

            <!-- Logo (lg-) -->
            <a href="#" class="lg:hidden">
              <span class="sr-only">Your Company</span>
              <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" class="h-8 w-auto">
            </a>

            <div class="flex flex-1 items-center justify-end">
              <a href="#" class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">Search</a>

              <div class="flex items-center lg:ml-8">
                <!-- Help -->
                <a href="#" class="p-2 text-gray-400 hover:text-gray-500 lg:hidden">
                  <span class="sr-only">Help</span>
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                  </svg>
                </a>
                <a href="#" class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">Help</a>

                <!-- Cart -->
                <div class="ml-4 flow-root lg:ml-8">
                  <a href="#" class="group -m-2 flex items-center p-2">
                    <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                    <span class="sr-only">items in cart, view bag</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <!-- Hero section -->
    <div class="relative">
      <!-- Background image and overlap -->
      <div aria-hidden="true" class="absolute inset-0 hidden sm:flex sm:flex-col">
        <div class="relative w-full flex-1 bg-gray-800">
          <div class="absolute inset-0 overflow-hidden">
            <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt="" class="h-full w-full object-cover object-center">
          </div>
          <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
        </div>
        <div class="h-32 w-full bg-white md:h-40 lg:h-48"></div>
      </div>

      <div class="relative mx-auto max-w-3xl px-4 pb-96 text-center sm:px-6 sm:pb-0 lg:px-8">
        <!-- Background image and overlap -->
        <div aria-hidden="true" class="absolute inset-0 flex flex-col sm:hidden">
          <div class="relative w-full flex-1 bg-gray-800">
            <div class="absolute inset-0 overflow-hidden">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt="" class="h-full w-full object-cover object-center">
            </div>
            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
          </div>
          <div class="h-48 w-full bg-white"></div>
        </div>
        <div class="relative py-32">
          <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl md:text-6xl">Mid-Season Sale</h1>
          <div class="mt-4 sm:mt-6">
            <a href="#" class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 font-medium text-white hover:bg-indigo-700">Shop Collection</a>
          </div>
        </div>
      </div>

      <section aria-labelledby="collection-heading" class="relative -mt-96 sm:mt-0">
        <h2 id="collection-heading" class="sr-only">Collections</h2>
        <div class="mx-auto grid max-w-md grid-cols-1 gap-y-6 px-4 sm:max-w-7xl sm:grid-cols-3 sm:gap-x-6 sm:gap-y-0 sm:px-6 lg:gap-x-8 lg:px-8">
          <div class="group relative h-96 rounded-lg bg-white shadow-xl sm:aspect-h-5 sm:aspect-w-4 sm:h-auto">
            <div>
              <div aria-hidden="true" class="absolute inset-0 overflow-hidden rounded-lg">
                <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-collection-01.jpg" alt="Woman wearing a comfortable cotton t-shirt." class="h-full w-full object-cover object-center">
                </div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
              </div>
              <div class="absolute inset-0 flex items-end rounded-lg p-6">
                <div>
                  <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                  <h3 class="mt-1 font-semibold text-white">
                    <a href="#">
                      <span class="absolute inset-0"></span>
                      Women&#039;s
                    </a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          <div class="group relative h-96 rounded-lg bg-white shadow-xl sm:aspect-h-5 sm:aspect-w-4 sm:h-auto">
            <div>
              <div aria-hidden="true" class="absolute inset-0 overflow-hidden rounded-lg">
                <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-collection-02.jpg" alt="Man wearing a comfortable and casual cotton t-shirt." class="h-full w-full object-cover object-center">
                </div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
              </div>
              <div class="absolute inset-0 flex items-end rounded-lg p-6">
                <div>
                  <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                  <h3 class="mt-1 font-semibold text-white">
                    <a href="#">
                      <span class="absolute inset-0"></span>
                      Men&#039;s
                    </a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          <div class="group relative h-96 rounded-lg bg-white shadow-xl sm:aspect-h-5 sm:aspect-w-4 sm:h-auto">
            <div>
              <div aria-hidden="true" class="absolute inset-0 overflow-hidden rounded-lg">
                <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                  <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-collection-03.jpg" alt="Person sitting at a wooden desk with paper note organizer, pencil and tablet." class="h-full w-full object-cover object-center">
                </div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
              </div>
              <div class="absolute inset-0 flex items-end rounded-lg p-6">
                <div>
                  <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                  <h3 class="mt-1 font-semibold text-white">
                    <a href="#">
                      <span class="absolute inset-0"></span>
                      Desk Accessories
                    </a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <section aria-labelledby="trending-heading">
      <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8 lg:pt-32">
        <div class="md:flex md:items-center md:justify-between">
          <h2 id="favorites-heading" class="text-2xl font-bold tracking-tight text-gray-900">Trending Products</h2>
          <a href="#" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">
            Shop the collection
            <span aria-hidden="true"> &rarr;</span>
          </a>
        </div>

        <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
          <div class="group relative">
            <div class="h-56 w-full overflow-hidden rounded-md group-hover:opacity-75 lg:h-72 xl:h-80">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-trending-product-02.jpg" alt="Hand stitched, orange leather long wallet." class="h-full w-full object-cover object-center">
            </div>
            <h3 class="mt-4 text-sm text-gray-700">
              <a href="#">
                <span class="absolute inset-0"></span>
                Leather Long Wallet
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Natural</p>
            <p class="mt-1 text-sm font-medium text-gray-900">$75</p>
          </div>

          <!-- More products... -->
        </div>

        <div class="mt-8 text-sm md:hidden">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            Shop the collection
            <span aria-hidden="true"> &rarr;</span>
          </a>
        </div>
      </div>
    </section>

    <section aria-labelledby="perks-heading" class="border-t border-gray-200 bg-gray-50">
      <h2 id="perks-heading" class="sr-only">Our perks</h2>

      <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
        <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-0">
          <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
            <div class="md:flex-shrink-0">
              <div class="flow-root">
                <img class="-my-1 mx-auto h-24 w-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg" alt="">
              </div>
            </div>
            <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
              <h3 class="text-base font-medium text-gray-900">Free returns</h3>
              <p class="mt-3 text-sm text-gray-500">Not what you expected? Place it back in the parcel and attach the pre-paid postage stamp.</p>
            </div>
          </div>
          <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
            <div class="md:flex-shrink-0">
              <div class="flow-root">
                <img class="-my-1 mx-auto h-24 w-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg" alt="">
              </div>
            </div>
            <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
              <h3 class="text-base font-medium text-gray-900">Same day delivery</h3>
              <p class="mt-3 text-sm text-gray-500">We offer a delivery service that has never been done before. Checkout today and receive your products within hours.</p>
            </div>
          </div>
          <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
            <div class="md:flex-shrink-0">
              <div class="flow-root">
                <img class="-my-1 mx-auto h-24 w-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-gift-card-light.svg" alt="">
              </div>
            </div>
            <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
              <h3 class="text-base font-medium text-gray-900">All year discount</h3>
              <p class="mt-3 text-sm text-gray-500">Looking for a deal? You can use the code &quot;ALLYEAR&quot; at checkout and get money off all year round.</p>
            </div>
          </div>
          <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
            <div class="md:flex-shrink-0">
              <div class="flow-root">
                <img class="-my-1 mx-auto h-24 w-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg" alt="">
              </div>
            </div>
            <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
              <h3 class="text-base font-medium text-gray-900">For the planet</h3>
              <p class="mt-3 text-sm text-gray-500">We’ve pledged 1% of sales to the preservation and restoration of the natural environment.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer aria-labelledby="footer-heading" class="bg-gray-50">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="border-t border-gray-200 py-20">
        <div class="grid grid-cols-1 md:grid-flow-col md:auto-rows-min md:grid-cols-12 md:gap-x-8 md:gap-y-16">
          <!-- Image section -->
          <div class="col-span-1 md:col-span-2 lg:col-start-1 lg:row-start-1">
            <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" class="h-8 w-auto">
          </div>

          <!-- Sitemap sections -->
          <div class="col-span-6 mt-10 grid grid-cols-2 gap-8 sm:grid-cols-3 md:col-span-8 md:col-start-3 md:row-start-1 md:mt-0 lg:col-span-6 lg:col-start-2">
            <div class="grid grid-cols-1 gap-y-12 sm:col-span-2 sm:grid-cols-2 sm:gap-x-8">
              <div>
                <h3 class="text-sm font-medium text-gray-900">Products</h3>
                <ul role="list" class="mt-6 space-y-6">
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Bags</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Tees</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Objects</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Home Goods</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Accessories</a>
                  </li>
                </ul>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-900">Company</h3>
                <ul role="list" class="mt-6 space-y-6">
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Who we are</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Sustainability</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Press</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Careers</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Terms &amp; Conditions</a>
                  </li>
                  <li class="text-sm">
                    <a href="#" class="text-gray-500 hover:text-gray-600">Privacy</a>
                  </li>
                </ul>
              </div>
            </div>
            <div>
              <h3 class="text-sm font-medium text-gray-900">Customer Service</h3>
              <ul role="list" class="mt-6 space-y-6">
                <li class="text-sm">
                  <a href="#" class="text-gray-500 hover:text-gray-600">Contact</a>
                </li>
                <li class="text-sm">
                  <a href="#" class="text-gray-500 hover:text-gray-600">Shipping</a>
                </li>
                <li class="text-sm">
                  <a href="#" class="text-gray-500 hover:text-gray-600">Returns</a>
                </li>
                <li class="text-sm">
                  <a href="#" class="text-gray-500 hover:text-gray-600">Warranty</a>
                </li>
                <li class="text-sm">
                  <a href="#" class="text-gray-500 hover:text-gray-600">Secure Payments</a>
                </li>
                <li class="text-sm">
                  <a href="#" class="text-gray-500 hover:text-gray-600">FAQ</a>
                </li>
                <li class="text-sm">
                  <a href="#" class="text-gray-500 hover:text-gray-600">Find a store</a>
                </li>
              </ul>
            </div>
          </div>

          <!-- Newsletter section -->
          <div class="mt-12 md:col-span-8 md:col-start-3 md:row-start-2 md:mt-0 lg:col-span-4 lg:col-start-9 lg:row-start-1">
            <h3 class="text-sm font-medium text-gray-900">Sign up for our newsletter</h3>
            <p class="mt-6 text-sm text-gray-500">The latest deals and savings, sent to your inbox weekly.</p>
            <form class="mt-2 flex sm:max-w-md">
              <label for="email-address" class="sr-only">Email address</label>
              <input id="email-address" type="text" autocomplete="email" required class="w-full min-w-0 appearance-none rounded-md border border-gray-300 bg-white px-4 py-2 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
              <div class="ml-4 flex-shrink-0">
                <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Sign up</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="border-t border-gray-100 py-10 text-center">
        <p class="text-sm text-gray-500">&copy; 2021 Your Company, Inc. All rights reserved.</p>
      </div>
    </div>
  </footer>
</div>

@endsection
