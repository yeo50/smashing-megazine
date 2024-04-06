<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard is here') }}
        </h2>
    </x-slot> --}}




    <div class="grid grid-cols-3 gap-2">
        <div class="col-start-1 col-span-2 p-6">

            <p class="ms-8 mb-5"><span class="text-red-600 text-xl"><a
                        href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></span>
                Wrote</p>
            <div class="flex">
                <div>
                    <img src="{{ asset('storage/' . $post->photo) }}" alt="" class="w-52 h-52">
                </div>
                <div class="ms-5">
                    <h1 class="text-3xl text-black mb-5 ">{{ $post->title }}<span class="text-gray-600 text-base"> /
                            {{ $post->formatted_created_at }}</span></h1>
                    <p>{{ $post->description }}</p>
                    <a href="{{ route('posts.feature') }}">
                        <p class="text-red-600 mt-5"> {{ $post->is_featured === 1 ? 'Featured Post' : '' }}</p>
                    </a>
                </div>

            </div>

            <form action="{{ route('comments.store') }}" method="post" class="block  my-4 w-10/12 ps-6">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <x-input-label for="content"> Your comments Here</x-input-label>
                <x-text-area class="w-full h-12" name="content" id="content"></x-text-area>
                <input type="submit" value="Comment" class="px-4 py-2 bg-blue-500 rounded-full text-white shadow">
            </form>
            @foreach ($post->comments as $comment)
                <div>

                    <div x-data="{ showParagraph: true, showInput: false, menuOpen: false }" class="flex justify-between relative my-2">
                        <div class="ms-8 w-10/12">
                            <p class="ps-2 text-red-700">{{ $comment->user->name }}</p>
                            <div x-show="showParagraph" class="flex justify-between w-full ">
                                <p class="ps-2 inline-block">{{ $comment->content }}</p>
                                <p class="inline-block">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                            <div x-show="showInput">
                                <div class="relative  h-24 w-48">
                                    <button @click = "showParagraph = true ; showInput = false"
                                        class="px-4 py-2 me-2 hover:bg-gray-500 hover:text-whte hover:rounded-xl
                                             hover:text-white absolute bottom-0 left-0">Cancel</button>
                                    <form action="{{ route('comments.update', $comment->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="{{ $comment->post_id }} " name="post_id">
                                        <input type="text" value="{{ $comment->content }}" name="content" autofocus
                                            class="absolute top-0 left-0">

                                        <input type="submit" value="Save"
                                            class="px-6 py-2 me-2 bg-gray-600 rounded-xl text-white absolute bottom-0 right-0">

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div x-data="{ menuOpen: false }">
                                <button @click="menuOpen = !menuOpen"><i
                                        class="fa-solid fa-ellipsis-vertical px-4 py-2"></i></button>


                                @if (Auth::user()->id === $comment->user_id)
                                    <div x-show="menuOpen" @click.outside="menuOpen = false"
                                        class="absolute bottom-0 right-0 px-4 py-2 bg-gray-800 text-white rounded-lg">
                                        <button @click="showInput = true; showParagraph = false; menuOpen = false"
                                            class="mb-1 hover:bg-gray-600 px-3 py-2 block rounded-md">
                                            Edit
                                        </button>
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete"
                                                class="hover:bg-gray-600 px-3 py-2 block rounded-md">
                                        </form>
                                    </div>
                                @endif
                                @if (Auth::user()->id !== $comment->user_id)
                                    <div x-show ="menuOpen" @click.outside = "menuOpen = false"
                                        class="absolute bottom-0 right-0 px-4 py-2 bg-gray-800 text-white rounded-lg">
                                        <button>Report</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
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
