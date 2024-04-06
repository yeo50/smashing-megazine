<x-app-layout>
    <div class="block w-11/12 mx-auto pt-10 ">
        <div before="{{ $category->posts()->count() }} Post"
            class=" pb-5 underline-deco  before:content-[attr(before)] before:absolute before:left-0 before:bottom-0 before:translate-y-1/2  before:z-4 before:bg-[#f3f4f6] before:pe-2">
            <h1 class="text-gray-500 text-2xl font-bold">Category</h1>
            <h1 class="text-5xl font-[1000] text-black-600">{{ $category->title }}</h1>
            <p>Also related to</p>
            <div class="flex my-4 flex-wrap ">
                <button
                    class="px-4 py-2 mx-2 my-2 bg-blue-200 rounded-lg text-base text-green-800 font-bold hover:outline hover:outline-1">Designs
                    Patterns
                </button>

                <button
                    class="px-4 py-2 mx-2 my-2 bg-blue-200 rounded-lg text-base text-green-800 font-bold hover:outline hover:outline-1">Designs
                    Planning
                </button>
                <button
                    class="px-4 py-2 mx-2 my-2 bg-blue-200 rounded-lg text-base text-green-800 font-bold hover:outline hover:outline-1">
                    UX Design
                </button>
                <button
                    class="px-4 py-2 mx-2 my-2 bg-blue-200 rounded-lg text-base text-green-800 font-bold hover:outline hover:outline-1">
                    Usability
                </button>
                <button
                    class="px-4 py-2 mx-2 my-2 bg-blue-200 rounded-lg text-base text-green-800 font-bold hover:outline hover:outline-1">
                    Content Strategy
                </button>
                <button
                    class="px-4 py-2 mx-2 my-2 bg-blue-200 rounded-lg text-base text-green-800 font-bold hover:outline hover:outline-1">
                    E-commerce
                </button>
                <button
                    class="px-4 py-2 mx-2 my-2 bg-blue-200 rounded-lg text-base text-green-800 font-bold hover:outline hover:outline-1">
                    User Research
                </button>
                <button
                    class="px-4 py-2 mx-2 my-2 bg-blue-200 rounded-lg text-base text-green-800 font-bold hover:outline hover:outline-1">
                    Psycology
                </button>
            </div>
        </div>
        <div class="category mt-10">
            @foreach ($category->posts as $post)
                <div class="my-4">
                    <h1 class="text-red-400 font-bold">{{ $post->title }}</h1>
                    <p>{{ $post->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
