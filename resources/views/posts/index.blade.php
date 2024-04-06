<x-app-layout>
    <div class="grid grid-cols-3 gap-2">
        <div class="col-start-1 col-span-2 p-6">
            <a href="{{ route('posts.create') }}" class="text-blue-800"> Create Your Own Post</a>
            <p class="ps-6">{{ count($posts) }} Posts Total</p>
            @foreach ($posts as $post)
                <div class="post-container mb-8 ps-6 pt-6 pe-6">
                    <div class="post-header flex mb-6">
                        <div class="h-20 w-28 bg-red-300"><img src="{{ asset('storage/' . $post->photo) }}"
                                class="w-full h-full " alt="" class="block">
                        </div>
                        <div>
                            <a href="{{ route('users.show', $post->user->id) }}">
                                <h3 class="ms-8 text-red-500 font-semibold text-lg inline-block underline">
                                    {{ $post->user->name }}
                                </h3>
                            </a>

                            <p>
                                <a href="{{ route('posts.show', $post->id) }}"
                                    class="text-black-600 text-3xl font-black ms-8">{{ $post->title }}</a>
                            </p>
                            <span class="ms-8"> {{ $post->formatted_created_at }} in</span>
                            <span class="text-xl font-bold text-gray-600"><a
                                    href="{{ route('categories.show', $post->category->id) }}">{{ $post->category->title }}</a></span>

                        </div>


                    </div>
                    <div class="post-content flex">
                        <p> {{ $post->description }}</p>
                        <div class="action-button flex flex-col ms-3">
                            @auth


                                @if (Auth::user()->id === $post->user->id)
                                    <div class="flex flex-col">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="border bg-green-600 text-white px-3 py-1 rounded shadow-md text-center">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" onclick="return confrim('are you sure')" value="Delete"
                                                class="border bg-red-600 text-white px-3 py-1 rounded shadow-md">
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>

                </div>
                <p class=" w-10/12 text-end text-sm "><span class="me-1 text-red-500 ">&#x27A3;</span>
                    <span class="underline">{{ $post->comments()->count() }} comments</span>
                </p>
            @endforeach

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

</x-app-layout>
