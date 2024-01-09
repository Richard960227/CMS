<x-app-layout>
    @can('music.index')
        <x-slot name="header">
            <div class="flex-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Music') }}
            </div>
            <div class="flex-none">
                @if ($message = Session::get('success'))
                    <div role="alert" class="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="stroke-info shrink-0 w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                @endif
            </div>
        </x-slot>
        @include('components.cdn-links')
        <div class="lg:card w-full lg:w-10/12 bg-base-100 shadow-xl dark:bg-gray-800">
            <div class="card-body">
                <div class="flex">
                    <div class="flex-1">

                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-alphabetically"
                            data-table-id="music-table">
                            <i class="fa-solid fa-arrow-up-a-z fa-lg"></i>
                        </button>
                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-reverse"
                            data-table-id="music-table">
                            <i class="fa-solid fa-arrow-up-z-a fa-lg"></i>
                        </button>

                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-by-number"
                            data-table-id="music-table" data-sort="asc">
                            <i class="fa-solid fa-arrow-down-1-9"></i>
                        </button>
                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-by-number"
                            data-table-id="music-table" data-sort="desc">
                            <i class="fa-solid fa-arrow-down-9-1"></i>
                        </button>

                        <input type="text" id="searchInput" placeholder="Buscar..."
                            class="input input-bordered w-full max-w-xs caret-orange-600" data-table-id="music-table" />
                    </div>
                    <div class="flex-none justify-end items-center">
                        @can('music.create')
                            {{ __('Create New') }}
                            <button type="button"
                                class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white">
                                <a href="{{ route('music.create') }}" data-placement="left">
                                    <i class="fa-solid fa-plus fa-xl"></i>
                                </a>
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="max-h-96 overflow-auto">
                    <table id="music-table" class="table table-xs table-pin-rows">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>

                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Interpreter') }}</th>
                                <th>{{ __('Genre') }}</th>
                                <th>{{ __('Year') }}</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($music as $music)
                                <tr class="hover">
                                    <td>{{ $music->row_number }}</td>
                                    <td>
                                        <img src="{{ $music->image_url }}" alt="Music"
                                            class="mask mask-squircle min-w-12 min-h-12 max-w-12 max-h-12">
                                    </td>
                                    <td>
                                        <audio controls>
                                            <source src="{{ $music->media_url }}" type="audio/mp3">
                                        </audio>
                                    </td>
                                    <td>{{ $music->name }}</td>
                                    <td>
                                        @foreach ($music->interpreters as $interpreter)
                                            <ul class="list-[circle] list-inside">
                                                <li>{{ $interpreter->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($music->musicalGenres as $musicalgenre)
                                            <ul class="list-[circle] list-inside">
                                                <li>{{ $musicalgenre->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>{{ $music->year }}</td>

                                    <td class="text-right">
                                        <form action="{{ route('music.destroy', $music->id) }}" method="POST">
                                            @can('music.show')
                                                <button type="button"
                                                    class="btn btn-ghost mask mask-squircle text-blue-600 hover:bg-blue-600 hover:text-white">
                                                    <a href="{{ route('music.show', $music->id) }}">
                                                        <i class="fa-regular fa-eye fa-xl"></i>
                                                    </a>
                                                </button>
                                            @endcan
                                            @can('music.edit')
                                                <button type="button"
                                                    class="btn btn-ghost mask mask-squircle text-yellow-600 hover:bg-yellow-600 hover:text-white">
                                                    <a href="{{ route('music.edit', $music->id) }}">
                                                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                                    </a>
                                                </button>
                                            @endcan
                                            @can('music.destroy')
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                                                    <i class="fa-regular fa-trash-can fa-xl"></i>
                                                </button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
