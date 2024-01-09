<x-app-layout>
    @can('audio-libraries.edit')
        <x-slot name="header">
            <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                <a href="{{ route('audio-libraries.index') }}">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </button>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Update') }} {{ __('Audio Library') }}
            </h2>
        </x-slot>
        @includeif('partials.errors')
        <div class="card w-96 shrink-0 shadow-2xl bg-base-100">
            <form class="card-body" method="POST" action="{{ route('audio-libraries.update', $audioLibrary->id) }}"
                role="form" enctype="multipart/form-data">
                @can('audio-libraries.update')
                    {{ method_field('PATCH') }}
                    @csrf
                    @include('audio-library.form')
                @endcan
            </form>
        </div>
    @endcan
</x-app-layout>
