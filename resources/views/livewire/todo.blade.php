<div>
    <livewire:nav>
        <div class="container flex justify-center mx-auto my-5">
            <form class="flex items-center max-w-lg mx-auto" wire:submit="add">
                <label for="add" class="sr-only">
                    Tambah </label>
                <div class="relative w-full">
                    <input type="text" id="add" wire:model.debounce.300ms="name"
                        class="border text-sm rounded-lg block w-full ps-10 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tambah Tugas" required name="name" autocomplete="off" />
                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white rounded-lg border border-blue-700 focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="container flex justify-center mx-auto px-4 lg:px-8 my-2">
            <div class="bg-gray-800 shadow-md sm:rounded-lg overflow-hidden w-full">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Tugas</th>
                                <th scope="col" class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todo as $task)
                            <tr class="border-b border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium whitespace-nowrap text-white">
                                    <span>{{ $task->created_at->translatedFormat('d F Y') }}</span>
                                    <p class="text-gray-300">{{ $task->name }}</p>
                                </th>
                                <td class="px-3 py-4">
                                    <div class="flex justify-end">
                                        <button wire:click="delete({{ $task->id }})" type="button"
                                            class="text-white focus:ring-4 font-medium rounded-lg text-sm px-3 py-2.5 bg-red-600 hover:bg-red-700 focus:ring-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>

                                        <button wire:click="edit({{ $task->id }})" data-modal-target="crud-modal"
                                            data-modal-toggle="crud-modal" type="button"
                                            class="inline ml-2 text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-800 font-medium rounded-lg text-sm px-3 py-2.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>

                                        <button wire:click="check({{ $task->id }})" type="button"
                                            class="inline ml-2 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-800 font-medium rounded-lg text-sm px-3 py-2.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="px-4 py-3 text-center text-gray-400">
                                    Data tugas tidak ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-4 py-3 bg-gray-700">
                    {{ $todo->links() }}
                </div>

            </div>
        </div>

        @if($editId)
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-gray-700 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                        <h3 class="text-lg font-semibold text-white">
                            Edit tugas
                        </h3>
                    </div>
                    <form class="p-4 md:p-5" wire:submit="update">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="nameEdit" class="block mb-2 text-sm font-medium text-white">Tugas</label>
                                <input type="text" name="nameEdit" id="nameEdit" wire:model="nameEdit"
                                    class="bg-gray-600 border border-gray-500 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder-gray-400"
                                    placeholder="Ketik nama tugas" required autocomplete="off">
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" wire:click="cancelEdit"
                                class="text-gray-300 bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-600 rounded-lg border border-gray-500 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">
                                Batal
                            </button>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

        <div class="container flex justify-center mx-auto px-4 lg:px-8 my-2">
            <div class="bg-gray-800 shadow-md sm:rounded-lg overflow-hidden w-full">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Tugas Selesai</th>
                                <th scope="col" class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todoCheck as $task)
                            <tr class="border-b border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-white whitespace-nowrap">
                                    <span>{{ $task->created_at->translatedFormat('d F Y') }}</span>
                                    <p class="text-gray-300">{{ $task->name }}</p>

                                </th>
                                <td class="px-3 py-4">
                                    <div class="flex justify-end">
                                        <button wire:click="delete({{ $task->id }})" type="button"
                                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>

                                        <button wire:click="uncheck({{ $task->id }})" type="button"
                                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-2.5 ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="px-4 py-3 text-center text-gray-400">
                                    Data tugas tidak ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-4 py-3 bg-gray-700">
                    {{ $todoCheck->links() }}
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-1"
                    aria-label="Table navigation">
                    <button wire:click="clear" type="button" wire:confirm="Apakah anda yakin untuk menghapus?"
                        class="m-2 focus:outline-none text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-900 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 inline">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Hapus semua tugas</button>
                </nav>

            </div>
        </div>
</div>
