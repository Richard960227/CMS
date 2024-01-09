<x-app-layout>
    @can('podcasts.index')
        <x-slot name="header">
            <div class="flex-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Podcast') }}
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
        <div class="lg:card w-full bg-base-100 shadow-xl dark:bg-gray-800">
            <div class="card-body">
                <div class="flex">
                    <div class="flex-1">

                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-alphabetically"
                            data-table-id="podcasts-table">
                            <i class="fa-solid fa-arrow-up-a-z fa-lg"></i>
                        </button>
                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-reverse"
                            data-table-id="podcasts-table">
                            <i class="fa-solid fa-arrow-up-z-a fa-lg"></i>
                        </button>

                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-by-number"
                            data-table-id="podcasts-table" data-sort="asc">
                            <i class="fa-solid fa-arrow-down-1-9"></i>
                        </button>
                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-by-number"
                            data-table-id="podcasts-table" data-sort="desc">
                            <i class="fa-solid fa-arrow-down-9-1"></i>
                        </button>

                        <input type="text" id="searchInput" placeholder="Buscar..."
                            class="input input-bordered w-full max-w-xs caret-orange-600" data-table-id="podcasts-table" />
                    </div>
                    <div class="flex-none justify-end items-center">
                        @can('podcasts.create')
                            {{ __('Create New') }}
                            <button type="button"
                                class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white">
                                <a href="{{ route('podcasts.create') }}" data-placement="left">
                                    <i class="fa-solid fa-plus fa-xl"></i>
                                </a>
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="max-h-96 overflow-auto">
                    <table id="podcasts-table" class="table table-xs table-pin-rows table-auto">
                        <!-- head -->
                        <thead>
                            <tr class="hover">
                                <th></th>
                                <th></th>

                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Frequency') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Producer') }}</th>
                                <th>{{ __('Synopsis') }}</th>
                                <th>{{ __('Created') }}</th>
                                <th>{{ __('Updated') }}</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($podcasts as $podcast)
                                <tr class="hover">
                                    <td class="font-semibold">{{ $podcast->row_number }}</td>
                                    <td class="flex flex-col">
                                        <img src="{{ $podcast->image_url }}" alt="Podcast"
                                            class="mask mask-squircle min-w-12 min-h-12 max-w-12 max-h-12 m-1 mx-auto">
                                        <audio controls class="mx-auto">
                                            <source src="{{ $podcast->media_url }}" type="audio/mp3">
                                        </audio>
                                    </td>
                                    <td>{{ $podcast->name }}</td>
                                    <td>
                                        @foreach ($podcast->stations as $station)
                                            <ul class="list-[circle] list-inside">
                                                <li>{{ $station->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($podcast->categories as $category)
                                            <ul class="list-[circle] list-inside">
                                                <li>{{ $category->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($podcast->users as $user)
                                            <ul class="list-[circle] list-inside">
                                                <li>{{ $user->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td class="w-64 text-justify">{{ $podcast->synopsis }}</td>
                                    <td class="w-20">{{ $podcast->created_at }}</td>
                                    <td class="w-20">{{ $podcast->updated_at }}</td>

                                    <td>
                                        <form class="flex flex-col" action="{{ route('podcasts.destroy', $podcast->id) }}"
                                            method="POST">
                                            @can('podcasts.show')
                                                <button type="button"
                                                    class="btn btn-ghost mask mask-squircle text-blue-600 hover:bg-blue-600 hover:text-white">
                                                    <a href="{{ route('podcasts.show', $podcast->id) }}">
                                                        <i class="fa-regular fa-eye fa-xl"></i>
                                                    </a>
                                                </button>
                                            @endcan
                                            @can('podcasts.edit')
                                                <button type="button"
                                                    class="btn btn-ghost mask mask-squircle text-yellow-600 hover:bg-yellow-600 hover:text-white">
                                                    <a href="{{ route('podcasts.edit', $podcast->id) }}">
                                                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                                    </a>
                                                </button>
                                            @endcan
                                            @can('potcasts.destroy')
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
