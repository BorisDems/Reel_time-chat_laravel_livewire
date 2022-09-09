<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="home">
        <div class="w-100 h-100 content">
            <div class="leftimage p-5">
                <img src="{{ asset('full_stack_logos/node.jpg') }}" alt="">
                <img src="{{ asset('full_stack_logos/mysql.png') }}" alt="">
                <img src="{{ asset('full_stack_logos/laravel.png') }}" alt="">
                <img src="{{ asset('full_stack_logos/R.png') }}" alt="">
                <img src="{{ asset('full_stack_logos/git.png') }}" alt="">
                <img src="{{ asset('full_stack_logos/docker.png') }}" alt="">
            </div>
            <div class="rightimage p-5">
                <img src="{{ asset('full_stack_logos/angular.jfif') }}" alt="">
                <img src="{{ asset('full_stack_logos/bootstrap-logo.png') }}" alt="">
                <img src="{{ asset('full_stack_logos/jquery.gif') }}" alt="">
                <img src="{{ asset('full_stack_logos/react.png') }}" alt="">
                <img src="{{ asset('full_stack_logos/tailwindcss.jfif') }}" alt="">
                <img src="{{ asset('full_stack_logos/html.jpeg') }}" alt="">
            </div>
        </div>
    </div>
</x-app-layout>
