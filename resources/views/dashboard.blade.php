<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center mb-3">
            {{ __('Bienvenido al sistema') }}
            <strong>{{ Auth::user()->name }} ✅</strong>
        </>
        </h1>
    </x-slot>
</x-app-layout>