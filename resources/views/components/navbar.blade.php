<nav class="bg-gray-800 border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">MyTodo</span>
        </a>
        <button data-collapse-toggle="navbar-solid-bg" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
            aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul
                class="flex flex-col font-medium mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-800 md:bg-transparent border-gray-700">
                <li>
                    <a href="{{ route('login') }}"
                        class="block py-2 px-3 rounded-sm md:hover:bg-transparent md:border-0 md:py-2 md:px-2 text-white hover:bg-gray-700 hover:text-white">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}"
                        class="
                        block py-2 px-3 rounded-sm md:border-0 md:p-0 text-white sm:hover:bg-gray-700 hover:text-white
                          md:focus:ring-4 md:focus:ring-blue-300 md:font-medium md:rounded-lg md:text-sm md:px-5 md:py-2.5 md:me-2 md:mb-2 md:bg-blue-600 md:hover:bg-blue-700 md:focus:outline-none focus:ring-blue-900">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
