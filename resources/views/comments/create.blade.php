<x-app-layout>
    <h1 class="text-center"> Create your comment</h1>
    <form action="{{ route('comments.store') }}" method="post" class="block mx-auto my-4 w-2/5 h-16">
        @csrf
        <x-input-label for="content"> Your comments Here</x-input-label>
        <x-text-area class="w-full" name="content" id="content"></x-text-area>
        <input type="submit" value="Submit" class="px-4 py-2 bg-blue-500 rounded-md shadow">
    </form>
</x-app-layout>
