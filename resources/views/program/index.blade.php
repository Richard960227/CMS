<x-app-layout>
    @can('programs.index')
        <x-slot name="header">
            <div class="flex-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Programs') }}
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
                            data-table-id="programs-table">
                            <i class="fa-solid fa-arrow-up-a-z"></i>
                        </button>
                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-reverse"
                            data-table-id="programs-table">
                            <i class="fa-solid fa-arrow-up-z-a"></i>
                        </button>

                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-by-number"
                            data-table-id="programs-table" data-sort="asc">
                            <i class="fa-solid fa-arrow-down-1-9"></i>
                        </button>
                        <button type="button"
                            class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white sort-by-number"
                            data-table-id="programs-table" data-sort="desc">
                            <i class="fa-solid fa-arrow-down-9-1"></i>
                        </button>

                        <input type="text" id="searchInput" placeholder="Buscar..."
                            class="input input-bordered w-full max-w-xs caret-orange-600" data-table-id="programs-table" />
                    </div>
                    <div class="flex-none justify-end items-center">
                        @can('programs.create')
                            {{ __('Create New') }}
                            <button type="button"
                                class="btn btn-ghost mask mask-squircle text-orange-600 hover:bg-orange-600 hover:text-white">
                                <a href="{{ route('programs.create') }}" data-placement="left">
                                    <i class="fa-solid fa-plus fa-xl"></i>
                                </a>
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="max-h-96 overflow-auto">
                    <table id="programs-table" class="table table-xs table-pin-rows table-auto">
                        <!-- head -->
                        <thead>
                            <tr>
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
                            @foreach ($programs as $program)
                                <tr class="hover"
                                    style="background-image: url('{{ $program->banner_url }}'); background-position: center; background-size: cover;">
                                    <td class="font-semibold">{{ $program->row_number }}</td>
                                    <td>
                                        <img src="{{ $program->imageUrl }}" alt="Station"
                                            class="min-w-12 min-h-12 max-w-20 max-h-20">
                                    </td>
                                    <td class="font-bold">{{ $program->name }}</td>
                                    <td>
                                        @foreach ($program->stations as $station)
                                            <ul class="list-[circle] list-inside">
                                                <li>{{ $station->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($program->categories as $category)
                                            <ul class="list-[circle] list-inside">
                                                <li>{{ $category->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($program->users as $user)
                                            <ul class="list-[circle] list-inside">
                                                <li>{{ $user->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td class="w-72 text-justify">{{ $program->synopsis }}</td>
                                    <td class="w-20">{{ $program->created_at }}</td>
                                    <td class="w-20">{{ $program->updated_at }}</td>

                                    <td class="text-right">
                                        <form class="flex flex-col" action="{{ route('programs.destroy', $program->id) }}"
                                            method="POST">
                                            @can('programs.show')
                                                <button type="button"
                                                    class="btn btn-ghost mask mask-squircle text-blue-600 hover:bg-blue-600 hover:text-white">
                                                    <a href="{{ route('programs.show', $program->id) }}">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                </button>
                                            @endcan
                                            @can('programs.edit')
                                                <button type="button"
                                                    class="btn btn-ghost mask mask-squircle text-yellow-600 hover:bg-yellow-600 hover:text-white">
                                                    <a href="{{ route('programs.edit', $program->id) }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                </button>
                                            @endcan
                                            @can('programs.destroy')
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                                                    <i class="fa-regular fa-trash-can"></i>
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
