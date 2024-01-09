<x-app-layout>
    @can('programs.show')
        <x-slot name="header">
            <div class="flex items-center">
                <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                    <a href="{{ route('programs.index') }}">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $program->name ?? __('Show') . __('Program') }}
                </h2>
            </div>
        </x-slot>
        <div class="md:flex">
            <div style="background-image: url('{{ $program->banner_url }}'); background-position: center; background-size: cover;"
                class="size-full md:size-96 md:rounded-l-2xl mx-0 md:ml-auto shadow-2xl">
                <img src="{{ $program->imageUrl }}" alt="Program" class="size-48 mx-auto md:my-24">
            </div>
            <div class="card w-full bg-base-100 shadow-2xl rounded-none md:rounded-r-2xl mx-0 md:mr-auto">
                <div class="card-body h-96 overflow-y-auto">
                    <div class="md:flex md:flex-row p-4">
                        <div class="md:basis-1/3">
                            <div class="form-control">
                                <strong>{{ __('Name') }}:</strong>
                                {{ $program->name }}
                            </div>
                            <div class="form-control">
                                <strong>{{ __('Product') }}:</strong>
                                @foreach ($program->users as $user)
                                    <ul class="list-[circle] list-inside">
                                        <li>{{ $user->name }}</li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-control md:basis-1/3">
                            <strong>{{ __('Frequency') }}:</strong>
                            @foreach ($program->stations as $station)
                                <ul class="list-[circle] list-inside">
                                    <li>{{ $station->name }}</li>
                                </ul>
                            @endforeach
                        </div>
                        <div class="form-control md:basis-1/3">
                            <strong>{{ __('Category') }}:</strong>
                            @foreach ($program->categories as $category)
                                <ul class="list-[circle] list-inside">
                                    <li>{{ $category->name }}</li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-control md:h-40 md:overflow-y-auto text-justify">
                        <strong>{{ __('Synopsis') }}:</strong>
                        {{ $program->synopsis }}
                    </div>
                    <div class="form-control">
                        <strong>{{ __('Path') }}:</strong>
                        {{ $program->path }}
                    </div>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
