<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard is here') }}
        </h2>
    </x-slot> --}}


    <h1 class="ms-8 text-blue-600 mt-4"><a href="{{ route('posts.create') }}"> Create Your Own Post</a></h1>
    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data"
        class="mx-auto mt-12 w-2/3  bg-white shadow p-5">
        @csrf
        @method('PATCH')
        {{-- Name  --}}
        {{-- <input type="text" value="{{ Auth::user()->id }}" name="user_id"> --}}

        <div>
            <x-input-label for="title" class="text-xl">
                {{ 'Title' }}
            </x-input-label>
            <x-text-input id="title" class="block mt-1 w-full" name="title" type="text"
                value="{{ $post->title }}" required autofocus autocomplete="title"></x-text-input>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

        </div>
        {{-- Description  --}}
        <div>
            <x-input-label for="description" class="text-xl mt-1">
                {{ 'Description' }}
            </x-input-label>
            <x-text-area id="description" class="block mt-1 w-full h-60" name="description"
                value="{{ $post->description }}" required autofocus autocomplete="description">
            </x-text-area>
        </div>
        {{-- Category_id --}}
        <div>
            <x-input-label for="category_id" class="mt-4 text-xl">
                {{ 'Select Category' }}
            </x-input-label>
            <select name="category_id" id="category_id" class="block mt-1 w-full">
                <option value="1">Accessibility</option>
                <option value="2">UX</option>
                <option value="3">CSS</option>
                <option value="4">Javascript</option>
                <option value="5">Performance</option>
                <option value="6">Design</option>
                <option value="7">React</option>
                <option value="8">Vue</option>
                <option value="9">Web design</option>
                <option value="10">Guides</option>
            </select>
        </div>
        <x-input-label for="photo" class="text-xl my-2">
            {{ 'Photo' }}
        </x-input-label>
        <input type="file" name="photo" id="photo" class="my-2">
        <input type="checkbox" value="1" id="" name="is_featured" class="my-2"
            {{ $post->is_featured === 1 ? 'checked' : '' }}> Is-featured <br>
        {{-- <x-primary-button class="ms-4" type="submit" class="my-2">
            {{ __('Register') }}
        </x-primary-button> --}}
        <input type="submit" value="Submit"
            class="p-2 mt-4 bg-blue-600 shadow-lg text-white hover:bg-blue-900 hover:ring rounded-md mx-auto block">
    </form>
</x-app-layout>
