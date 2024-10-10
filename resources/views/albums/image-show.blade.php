<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Image - {{$album->title}}
        </h2>
    </x-slot>



    <!-- component -->
    <div class="max-w-[720px] mx-auto p-4">
        <div class="flex m-2 p-2">
            <!-- Image Container -->
            <div class="flex-shrink-0 m-2 p-2">
                <img src="{{ $photo->getUrl() }}" alt="Album Image" class="max-w-[300px] h-auto rounded-lg shadow-md object-cover">
            </div>

            <!-- Details Container -->
            <div class="flex-grow m-2 p-2">
                <ul class="list-disc pl-5 space-y-2">
                    <li class="text-sm font-semibold truncate max-w-[300px]">
                        <strong>Title:</strong> {{ $photo->name }}
                    </li>
                    <li class="text-sm max-w-[300px]">
                        <strong>Mime Type:</strong> {{ $photo->mime_type }}
                    </li>
                    <li class="text-sm max-w-[300px]">
                        <strong>Size:</strong> {{ $photo->human_readable_size }}
                    </li>
                    <li class="text-sm max-w-[300px]">
                        <strong>Uploaded At:</strong> {{ $photo->created_at->format('d M Y') }}
                    </li>
                    <!-- Add more details as needed -->
                </ul>
            </div>
        </div>

    </div>









</x-app-layout>
