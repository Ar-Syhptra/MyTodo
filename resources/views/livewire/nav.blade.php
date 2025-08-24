<div class="sticky top-0 z-50 right-0">
    <nav class=" bg-gray-800 border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse" wire:navigate>
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">MyTodo</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOPA0V7isYUzbHVkk7eIhqhkHUvGNF2uEwXg&s"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none divide-y rounded-lg shadow-sm bg-gray-700 divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-white">{{ auth()->user()->name }}</span>
                        <span class="block text-sm truncate text-gray-400">{{ auth()->user()->email
                            }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white"
                                wire:navigate>Home</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" wire:submit="logout">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
