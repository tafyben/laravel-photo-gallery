<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Albums - Index') }}
        </h2>
    </x-slot>



    <!-- component -->
    <div class="max-w-[720px] mx-auto p-4">
        <a href="{{ route('albums.create') }}" class="inline-block mb-4 px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
            Create
        </a>

        <div class="relative overflow-hidden rounded-lg shadow-lg bg-white">
            <table class="w-full table-auto text-left">
                <thead>
                <tr class="bg-gradient-to-r from-slate-50 to-slate-100">
                    <th class="p-4 border-b border-slate-200 text-slate-700 font-medium text-left">
                        ID
                    </th>
                    <th class="p-4 border-b border-slate-200 text-slate-700 font-medium text-left">
                        Title
                    </th>
                    <th class="p-4 border-b border-slate-200 text-slate-700 font-medium text-left">
                        Status
                    </th>
                    <th class="p-4 border-b border-slate-200 text-slate-700 font-medium text-left">
                        Image
                    </th>
                    <th class="p-4 text-sm text-slate-600">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @if($albums->isEmpty())
                    <tr>
                        <td colspan="5" class="p-4 text-center text-slate-600">
                            No albums yet.
                        </td>
                    </tr>
                @else
                    @foreach($albums as $album)
                        <tr class="hover:bg-slate-50 border-b border-slate-200 transition ease-in-out duration-150">
                            <td class="p-4 text-sm font-semibold text-slate-800">
                                {{ $album->id }}
                            </td>
                            <td class="p-4 text-sm text-slate-600">
                                {{ $album->title }}
                            </td>
                            <td class="p-4 text-sm text-slate-600">
                                {{ $album->status }}
                            </td>
                            <td class="p-4 text-sm text-slate-600">
                                <img src="{{ $album->image_url ?? 'https://via.placeholder.com/50' }}" alt="Album Image" class="w-12 h-12 rounded-full object-cover">
                            </td>
                            <td class="p-4 text-sm text-slate-600 space-x-2">
                                <a href="{{route('albums.edit', $album->id)}}" class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    Edit
                                </a>
                                <a href="{{route('albums.destroy', $album->id)}}" class="px-4 py-2 text-white bg-blue-300 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>







</x-app-layout>
