<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Album - {{$album->title}}
        </h2>
    </x-slot>



    <!-- component -->
    <div class="max-w-[720px] mx-auto p-4">
        <!-- Image Upload Section -->
        <div class="relative overflow-hidden rounded-lg shadow-lg bg-white">
            <div class="p-4" x-data="{ imagePreview: '', hasFile: false }">
                <!-- Blade form for uploading images -->
                <form method="POST" action="{{ route('albums.upload', $album->id) }}" enctype="multipart/form-data">
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

        <!-- Uploaded Images Display Section -->
        <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Uploaded Images</h2>

            @if($album->getMedia('pictures')->isNotEmpty())
                <!-- Display uploaded images -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    @foreach($album->getMedia('pictures') as $media)
                        <div class="relative">
                            <img src="{{ $media->getUrl() }}" alt="Album Image" class="w-full h-auto rounded-lg shadow-md object-cover">
                            <div class="absolute top-2 right-2">
                            <!-- Delete Button (Optional) -->
                            <form action="{{ route('album.destroy', $pictures->id) }}" method="POST" class="absolute top-2 right-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-full hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-600">No images uploaded for this album yet.</p>
            @endif
        </div>
    </div>









</x-app-layout>
