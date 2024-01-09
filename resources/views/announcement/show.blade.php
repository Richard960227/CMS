<x-app-layout>
    @can('announcements.show')
    <x-slot name="header">
        <div class="flex items-center">
            <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                <a href="{{ route('announcements.index') }}">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </button>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $announcement->name ?? __('Show') . __('Announcement') }}
            </h2>
        </div>
    </x-slot>
    <div class="lg:flex">
            <img class="lg:w-2/5 lg:h-2/5 lg:rounded-l-2xl" src="{{ $announcement->imageUrl }}" alt="Announcement">
        <div class="card w-full lg:w-2/4 bg-base-100 shadow-xl rounded-none">
            <div class="card-body h-96 overflow-y-auto">
                <div class="form-control">
                    <strong>{{ __('Start') }}:</strong>
                    {{ $announcement->start }}
                </div>
                <div class="form-control">
                    <strong>{{ __('End') }}:</strong>
                    {{ $announcement->end }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Header') }}:</strong>
                    {{ $announcement->header }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Body') }}:</strong>
                    {{ $announcement->body }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Footer') }}:</strong>
                    {{ $announcement->footer }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Link') }}:</strong>
                    {{ $announcement->link }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Path') }}:</strong>
                    {{ $announcement->path }}
                </div>
            </div>
        </div>
    </div>
    @endcan
</x-app-layout>
