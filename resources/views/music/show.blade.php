<x-app-layout>
    @can('music.show')
        <x-slot name="header">
            <div class="flex items-center">
                <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                    <a href="{{ route('music.index') }}">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $music->name ?? __('Show') . __('Music') }}
                </h2>
            </div>
        </x-slot>
        <div class="card w-96 bg-base-100 shadow-xl">
            <figure>
                <img class="mt-8 mask mask-squircle" src="{{ $music->image_url }}" alt="Music">
            </figure>
            <div class="card-body">

                <div class="grid gap-4 grid-cols-2 grid-rows-3">
                    <div class="col-span-2">
                        <audio controls class="mx-auto">
                            <source src="{{ $music->media_url }}" type="audio/mp3">
                        </audio>
                    </div>
                    <div class="form-control">
                        <strong>{{ __('Interpreter') }}:</strong>
                        @foreach ($music->interpreters as $interpreter)
                            <ul class="list-[circle] list-inside">
                                <li>{{ $interpreter->name }}</li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="form-control row-span-2">
                        <strong>{{ __('Genre') }}:</strong>
                        @foreach ($music->musicalGenres as $musicalgenre)
                            <ul class="list-[circle] list-inside">
                                <li>{{ $musicalgenre->name }}</li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="form-control">
                        <strong>{{ __('Year') }}:</strong>
                        {{ $music->year }}
                    </div>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
