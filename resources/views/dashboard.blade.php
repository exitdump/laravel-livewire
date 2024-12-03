<x-app-layout>
    {{-- <x-slot name="header">
        <marquee dir="ltr" class="font-semibold text-sm text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </marquee>
    </x-slot> --}}
    <livewire:forms.create-post />
    <section id="newsfeed" class="space-y-6">

        <livewire:post-list />

    </section>
</x-app-layout>
