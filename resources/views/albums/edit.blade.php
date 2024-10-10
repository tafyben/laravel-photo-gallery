<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Albums - Edit') }}
        </h2>
    </x-slot>



    <!-- component -->
    <div class="max-w-[720px] mx-auto p-4">
        <form action="{{ route('albums.update', $album->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $album->title) }}" class="mt-1 px-4 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter title">
            </div>

            <!-- Add more form fields as needed and prefill them similarly -->

            <x-primary-button>Update</x-primary-button>
        </form>
    </div>










</x-app-layout>
