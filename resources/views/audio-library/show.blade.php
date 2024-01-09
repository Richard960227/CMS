<x-app-layout>
    @can('audio-libraries.show')
        <x-slot name="header">
            <div class="flex items-center">
                <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                    <a href="{{ route('audio-libraries.index') }}">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $audioLibrary->name ?? __('Show') . __('Audio Library') }}
                </h2>
            </div>
        </x-slot>
        <div class="card w-96 bg-base-100 shadow-2xl">
            <div class="card-body">
                <figure>
                    <audio controls class="mx-auto">
                        <source src="{{ $audioLibrary->media_url }}" type="audio/mp3">
                    </audio>
                </figure>
                <div class="form-control">
                    <strong>{{ __('Program') }}</strong>
                    {{ $audioLibrary->program->name }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Chapter') }}:</strong>
                    {{ $audioLibrary->name }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Categories') }}:</strong>
                    @foreach ($audioLibrary->program->categories as $category)
                        <ul class="list-[circle] list-inside">
                            <li>{{ $category->name }}</li>
                        </ul>
                    @endforeach
                </div>
                <div class="form-control">
                    <strong>{{ __('Synopsis') }}:</strong>
                    {{ $audioLibrary->synopsis }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Path') }}:</strong>
                    {{ $audioLibrary->path }}
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
