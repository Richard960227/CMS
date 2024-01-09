<x-app-layout>
    @can('stations.show')
        <x-slot name="header">
            <div class="flex items-center">
                <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                    <a href="{{ route('stations.index') }}">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $station->name ?? __('Show') . __('Station') }}
                </h2>
            </div>
        </x-slot>
        <div class="card w-96 bg-base-100 shadow-xl">
            <figure>
                <img src="{{ $station->imageUrl }}" alt="Station">
            </figure>
            <div class="card-body">
                <div class="form-control">
                    <strong>{{ __('Frequency') }}:</strong>
                    {{ $station->frequency }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Frequency Link') }}:</strong>
                    {{ $station->frequency_link }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Path') }}:</strong>
                    {{ $station->path }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Image') }}:</strong>
                    {{ $station->image }}
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
