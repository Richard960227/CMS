<x-app-layout>
    @can('interpreters.create')
        <x-slot name="header">
            <div class="flex-1">
                <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                    <a href="{{ route('interpreters.index') }}">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </button>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Create') }} {{ __('Interpreter') }}
                </h2>
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
        @includeif('partials.errors')
        <div class="card w-96 shrink-0 shadow-2xl bg-base-100">
            <form class="card-body" method="POST" action="{{ route('interpreters.store') }}" role="form"
                enctype="multipart/form-data">
                @can('interpreters.store')
                    @csrf
                    @include('interpreter.form')
                @endcan
            </form>
        </div>
    @endcan
</x-app-layout>
