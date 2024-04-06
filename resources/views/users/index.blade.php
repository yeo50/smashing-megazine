<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboardsss') }}
        </h2>
    </x-slot> --}}


    <div class="grid grid-cols-3 gap-2">
        <div class="col-start-1 col-span-2 p-6">
            <a href="{{ route('posts.create') }}" class="text-blue-800"> Create Your Own Post</a>

            <div class="user-container mb-8 p-6">
                <h1 class="text-red-600 text-xl">{{ $user->name }}</h1>
                <p>{{ $user->email }}</p>
                <p>{{ $user->phone }}</p>
                <p>{{ $user->address }}</p>


            </div>


        </div>
        <div class="col-start-3 col-end-4 mt-10 h-96 bg-blue-100 rounded-sm w-3/4 mx-auto">
            <img src="{{ asset('storage/photos/cat-in-the-chair.svg') }}" alt="cat-chair" class="w-2/3 h-60 block mx-auto">
            <div class="px-4">
                <button
                    class="text-center block mx-auto px-4 py-2 bg-white rounded-lg text-xl font-[1000] text-red-500 focus:outline-none focus:shadow-inner focus:shadow-gray-700 focus:bg-red-500 focus:text-white">
                    Front-End & UX
                    <br>
                    Workshops, Online
                </button>
            </div>
        </div>
    </div>
    <div class="post-detail ms-5">
        @foreach ($user->posts as $post)
            <a href="{{ route('posts.show', $post->id) }}">
                <p class="my-4 text-red-400">{{ $post->title }}</p>
            </a>
            <p> {{ $post->description }}</p>
        @endforeach
    </div>
</x-app-layout>
