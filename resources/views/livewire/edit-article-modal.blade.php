<!-- Somewhere above (e.g. wrapping your table) -->
<div x-data="{ editOpen: false }">
    <table>
        <!-- ... your rows ... -->
        <tr>
            <!-- ... -->
            <td>
                <button @click="editOpen = true"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                    ✏️ Edit
                </button>
            </td>
        </tr>
        <!-- ... -->
    </table>

    <!-- Dummy Modal -->
    <div x-show="editOpen" x-transition class="fixed inset-0 flex items-center justify-center z-50">

    <!-- Overlay -->
    <div 
        @click="editOpen = false">
    </div>

    <!-- Modal panel -->
    <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-xl z-50">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit artikel
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        @click="editOpen = false">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                {{-- <form wire:submit.prevent="updateArticle">
                    @csrf --}}
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="judul"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                            <input type="text" name="judul" id="judul" wire:model="judul" value="{{ $judul }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Judul Artikel">
                        </div>
                        <div>
                            <label for="category_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category_id" name="category_id" wire:model="categoryId"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $categoryId ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @empty
                                    <option selected="">Not Found</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="isi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten
                                Artikel</label>
                            <textarea id="isi" rows="5" name="isi" wire:model="isi"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Write a description...">{{ $isi }}</textarea>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="button" wire:click="updateArticle"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Update artikel
                        </button>
                        <button type="button"
                            class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Delete
                        </button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>

</div>

</div>




{{-- <div>
    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-lg font-bold mb-4">Edit Article</h2>

                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label class="block text-sm">Title</label>
                        <input type="text" wire:model="title" class="w-full border px-2 py-1 rounded">
                        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm">Content</label>
                        <textarea wire:model="content" class="w-full border px-2 py-1 rounded"></textarea>
                        @error('content') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" wire:click="$set('showModal', false)" class="bg-gray-400 text-white px-3 py-1 rounded">Cancel</button>
                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div> --}}
