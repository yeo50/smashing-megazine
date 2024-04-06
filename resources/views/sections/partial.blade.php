<section>
    <div class="grid grid-cols-3 gap-2 ">
        <div class="col-start-1 col-span-2 p-4">
            <a href="{{ route('posts.feature') }}">
                <h1 class="text-center text-red-400 hover:text-red-500 text-3xl font-bold mb-4">Featured Post</h1>
            </a>



            @foreach ($featuredPosts as $featuredPost)
                <div class="m-3 pb-3 flex ">
                    <div>
                        <a href="{{ route('users.show', $featuredPost->user->id) }}"
                            class="inline-block text-xl text-red-500">{{ $featuredPost->user->name }} </a>
                        <span>/ {{ $featuredPost->formatted_created_at }}</span>
                        <a href="{{ route('posts.show', $featuredPost->id) }}"
                            class="text-2xl block">{{ $featuredPost->title }}</a>
                        <p>{{ $featuredPost->description }}</p>
                    </div>
                    @auth

                        @if (Auth::user()->id === $featuredPost->user->id)
                            <div class="action-button flex flex-col ms-3">
                                <a href="{{ route('posts.edit', $featuredPost->id) }}"
                                    class="border bg-green-600 text-white px-2 py-1 text-center rounded shadow-md hover:bg-green-700 focus:outline-none focus:ring focus:red-green-300 active:bg-green-800">Edit</a>
                                <form action="{{ route('posts.destroy', $featuredPost->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit"
                                        class=" border bg-red-500 px-3 py-1 rounded shadow-md text-white hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 active:bg-red-800"
                                        value="Delete">
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
        <div class="col-start-3 col-end-4 p-2 w-3/4 bg-blue-100 rounded-sm block mx-auto">
            <div class="flex flex-col space-y-5 p-auto">
                <p class="text-xl font-[1000] px-6 py-2 text-center">Boost your skills live, <br>
                    with our online <br> workshops</p>
                <p class="text-center text-md">E.g. Successful Design Systems with Brad Frost and Accessibility For
                    Designers with
                    Stéphanie Walter.</p>
                <button
                    class="text-xl px-4 py-2 block mx-auto bg-green-500 rounded-md shadow-md mt-4 focus:shadow-inner focus:shadow-gray-600 text-white font-[1000] ">
                    Jump to all
                    workshops &#x21AC
                </button>
            </div>
        </div>
    </div>
</section>
