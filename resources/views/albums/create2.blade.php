<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Albums - Create') }}
        </h2>
    </x-slot>



    <!-- component -->
    <div class="max-w-[720px] mx-auto p-4">
        <div class="relative overflow-hidden rounded-lg shadow-lg bg-white">
            <div class="p-4" x-data="{ imagePreview: '', hasFile: false }">
                <!-- Blade form -->
                <form method="POST" action="{{ route('albums.create') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Image Upload Input -->
                    <label for="image-upload" class="block text-sm font-medium text-gray-700">
                        Upload Image
                    </label>
                    <input
                        type="file"
                        name="image"
                        id="image-upload"
                        accept="image/*"
                        @change="let file = $event.target.files[0]; if (file) { imagePreview = URL.createObjectURL(file); hasFile = true; }"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mt-2"
                        required
                    >

                    <!-- Image Preview -->
                     <template x-if="imagePreview">
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">Image Preview:</p>
                            <img :src="imagePreview" alt="Image Preview" class="w-full h-auto mt-2 rounded-lg shadow-md">
                        </div>
                    </template>

                    <!-- Save Button -->
                    <button
                        type="submit"
                        class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50"
                    >
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>








</x-app-layout>
