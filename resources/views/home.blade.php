<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-navbar></x-navbar>
    <section class="bg-gray-900 h-full flex justify-center items-center">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <h1 class="mb-6 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-white">
                MyTodo - To-Do List App
            </h1>
            <p class="mb-9 text-lg font-normal lg:text-xl sm:px-16 xl:px-48 text-gray-400">
                MyTodo adalah aplikasi to-do list yang berfungsi untuk membantu pengguna mencatat,
                mengatur, dan menyelesaikan tugas harian dengan mudah. Dengan tampilan yang clean dan fitur intuitif
                seperti tambah, hapus, dan tandai tugas selesai, aplikasi ini cocok untuk siapa pun yang ingin
                meningkatkan produktivitas hariannya.
            </p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="{{ route('todo') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-900">
                    Coba Sekarang
                </a>
            </div>
        </div>
    </section>
</x-layout>
