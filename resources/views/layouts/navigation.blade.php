<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-link href="/" :active="request()->is('/')">Home
                        </x-nav-link>
                        <x-nav-link href="/all-companies" :active="request()->is('all-companies')">Companies
                        </x-nav-link>
                        <x-nav-link href="/search" :active="request()->is('search')">Discover
                        </x-nav-link>
                        @auth
                            <div class="relative">
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">Manage <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdown" class="absolute top-10 left-0 hidden bg-gray-800 w-40"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <a href="{{ route('companies.index') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My
                                                Companies</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-white">Hello, <span>{{ Auth::user()->name }}</span></p>

                        @endauth
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @guest
                        <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                        <x-nav-link href="register" :active="request()->is('register')">Register</x-nav-link>
                    @endguest
                    @auth
                        <form action="/logout" method="POST">
                            @csrf
                            <x-basic.interchangeable-btn type="submit" types="2"
                                element="button">Logout</x-interchangeable-btn>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
