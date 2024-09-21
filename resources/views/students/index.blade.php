@extends('layouts.app')

@section('content')
    <div class="flex flex-col h-screen">
        <x-navbar />
        <x-sidebar />

        <main
            class="flex flex-col items-center justify-center flex-grow px-3 py-3 bg-gray-100 pt-36 sm:py-0 dark:bg-gray-900">
            <div class="w-full  lg:max-w-screen-2xl max-h-[600px] h-fit rounded-lg shadow-md relative flex justify-center">

                @can('modify-students')
                    @include('partials.alerts')

                    @include('partials.buttons')
                @endcan

                @include('partials.table')
            </div>
            <div class="w-full mx-auto mt-3 md:w-fit">{{ $students->links() }}</div>
        </main>
    </div>
    @can('modify-students')
        @include('partials.modals')
    @endcan
@endsection
