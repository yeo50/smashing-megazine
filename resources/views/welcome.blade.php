<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboardsss') }}
        </h2>
    </x-slot> --}}


    <div class="grid grid-cols-3 gap-2 mb-4">
        <div class="col-start-1 col-span-2 p-6">
            <a href="{{ route('posts.create') }}" class="text-blue-800"> Create Your Own Post</a>

            <div class="post-container mb-8 p-6">
                <div class="post-header flex mb-6">
                    <div class="h-20 w-28 bg-red-300"><img src="{{ asset('storage/' . $post->photo) }}"
                            class="w-full h-full " alt="" class="block">
                    </div>
                    <div>
                        <p class="ms-8 mb-5"><span class="text-red-600 text-xl"><a
                                    href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></span>
                            Wrote</p>
                        <h3 class="ms-8 text-3xl"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                        </h3>
                        {{-- <p>Author: <a href="{{ route('users.show', $post->user->id) }}"></a>
                        </p> --}}

                    </div>


                </div>
                <div class="post-content flex">
                    <p> {{ $post->description }}</p>
                    <div class="action-button flex flex-col ms-3">
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="border bg-green-600 text-white px-2 py-1 text-center rounded shadow-md hover:bg-green-700 focus:outline-none focus:ring focus:red-green-300 active:bg-green-800">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit"
                                class=" border bg-red-500 px-3 py-1 rounded shadow-md text-white hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 active:bg-red-800"
                                value="Delete">
                        </form>
                    </div>
                </div>

            </div>


        </div>
        <div class="col-start-3 col-end-4 mt-10 h-96 bg-blue-100 rounded-sm w-3/4 mx-auto">
            <img src="{{ asset('storage/photos/cat-in-the-chair.svg') }}" alt="cat-chair"
                class="w-2/3 h-60 block mx-auto">
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
    @include('sections/partial')
</x-app-layout>
