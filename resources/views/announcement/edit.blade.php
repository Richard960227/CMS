<x-app-layout>
    @can('announcements.edit')
        <x-slot name="header">
            <button class="btn btn-ghost mask mask-squircle text-red-600 hover:bg-red-600 hover:text-white">
                <a href="{{ route('announcements.index') }}">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </button>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Update') }} {{ __('Announcement') }}
            </h2>
        </x-slot>
        @includeif('partials.errors')
        <div class="card w-9/12 shrink-0 shadow-2xl bg-base-100">
            <form class="card-body" method="POST" action="{{ route('announcements.update', $announcement->id) }}"
                role="form" enctype="multipart/form-data">
                @can('announcements.update')
                    {{ method_field('PATCH') }}
                    @csrf
                    @include('announcement.form')
                @endcan
            </form>
        </div>
    @endcan
</x-app-layout>
