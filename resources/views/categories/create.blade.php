<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard is here') }}
        </h2>
    </x-slot> --}}

    >
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="w-96 block mx-auto mt-8">
            <label for="c-title" :value="__('Title')" class="text-3xl text-gray-700">
                Category Title
            </label>
            <x-text-input id="c-title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
    </form>
</x-app-layout>
