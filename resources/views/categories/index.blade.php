<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard is here') }}
        </h2>
    </x-slot> --}}


    <a href="{{ route('categories.create') }}" class="inline-block mt-5 ms-5 text-blue-600"> Create Category</a>
    <h1 class="text-2xl font-bold text-center mb-8">Category Lists</h1>
    @foreach ($categories as $category)
        <div class=" p-2 flex justify-between w-96 mx-auto">
            <div>
                <span class="text-black-400">{{ $category->id }}.</span>
                <h4 class="inline-block text-xl text-red-500">{{ $category->title }}</h4>
            </div>
            <div class="flex flex-col">
                <a href="{{ route('categories.edit', $category->id) }}"
                    class="text-white rounded-md px-4 py-2 border bg-blue-500 shadow-md
                hover:bg-blue-700 hover:ring focus:outline-none hover:ring-blue-300 text-center">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete"
                        class=" text-white rounded-md px-4 py-2 border bg-red-400 shadow-md
                    hover:bg-red-700 hover:ring focus:outline-none hover:ring-red-300">
                </form>
            </div>
        </div>
    @endforeach

</x-app-layout>
