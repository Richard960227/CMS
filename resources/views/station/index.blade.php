<x-app-layout>
    @can('stations.index')
        <x-slot name="header">
            <div class="flex-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Stations') }}
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
        <div class="md:card w-full bg-base-100 shadow-xl dark:bg-gray-800">
            <div class="card-body">
                <div class="flex">
                    <div class="flex-1">

                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-alphabetically"
                            data-table-id="stations-table">
                            <i class="fa-solid fa-arrow-up-a-z"></i>
                        </button>
                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-reverse"
                            data-table-id="stations-table">
                            <i class="fa-solid fa-arrow-up-z-a"></i>
                        </button>

                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-by-number"
                            data-table-id="stations-table" data-sort="asc">
                            <i class="fa-solid fa-arrow-down-1-9"></i>
                        </button>
                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-by-number"
                            data-table-id="stations-table" data-sort="desc">
                            <i class="fa-solid fa-arrow-down-9-1"></i>
                        </button>

                        <input type="text" id="searchInput" placeholder="Buscar..."
                            class="input input-bordered w-full max-w-xs caret-orange-600" data-table-id="stations-table" />

                    </div>
                    <div class="flex-none justify-end items-center">
                        @can('stations.create')
                            {{ __('Create New') }}
                            <button type="button"
                                class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white">
                                <a href="{{ route('stations.create') }}" data-placement="left">
                                    <i class="fa-solid fa-plus fa-xl"></i>
                                </a>
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="max-h-96 overflow-auto">
                    <table id="stations-table" class="table table-xs table-pin-rows table-auto">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>

                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Frequency') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Frequency Link') }}</th>
                                <th>{{ __('Created') }}</th>
                                <th>{{ __('Updated') }}</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stations as $station)
                                <tr class="hover">
                                    <td class="font-semibold">{{ $station->row_number }}</td>
                                    <td>
                                        <img src="{{ $station->image_url }}" alt="Station"
                                            class="mask mask-squircle min-w-12 min-h-12 max-w-12 max-h-12">
                                    </td>
                                    <td class="font-bold">{{ $station->name }}</td>
                                    <td>{{ $station->frequency }}</td>
                                    <td class="w-72 text-justify">{{ $station->description }}</td>
                                    <td>{{ $station->frequency_link }}</td>
                                    <td class="w-20">{{ $station->created_at }}</td>
                                    <td class="w-20">{{ $station->updated_at }}</td>

                                    <td class="text-right">
                                        <form class="flex flex-col" action="{{ route('stations.destroy', $station->id) }}" method="POST">
                                            @can('stations.show')
                                                <button type="button"
                                                    class="btn btn-ghost mask mask-squircle text-blue-600 hover:bg-blue-600 hover:text-white">
                                                    <a href="{{ route('stations.show', $station->id) }}">
                                                        <i class="fa-regular fa-eye fa-xl"></i>
                                                    </a>
                                                </button>
                                            @endcan
                                            @can('stations.edit')
                                                <button type="button"
                                                    class="btn btn-ghost mask mask-squircle text-yellow-600 hover:bg-yellow-600 hover:text-white">
                                                    <a href="{{ route('stations.edit', $station->id) }}">
                                                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                                    </a>
                                                </button>
                                            @endcan
                                            @can('stations.destroy')
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
                {{ $stations->links() }}
            </div>
        </div>
    @endcan
</x-app-layout>
