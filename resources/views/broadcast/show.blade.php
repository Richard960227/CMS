<x-app-layout>
    @can('broadcasts.show')
        <x-slot name="header">
            <div class="flex items-center">
                <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                    <a href="{{ route('programs.index') }}">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $broadcast->name ?? __('Show') . __('Broadcast') }}
                </h2>
            </div>
        </x-slot>
        <div class=" card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="form-control">
                    <strong>{{ __('Program') }}:</strong>
                    {{ $broadcast->program }}
                </div>
                <div class="form-control">
                    <strong>{{ __('Start') }}:</strong>
                    {{ $broadcast->start }}
                </div>
                <div class="form-control">
                    <strong>{{ __('End') }}:</strong>
                    {{ $broadcast->end }}
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
