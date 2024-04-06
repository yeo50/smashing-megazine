<x-app-layout>
    <h1>comments</h1>
    <a href="{{ route('comments.create') }}" class="my-6 text-blue-500 text-xl">Create comments</a>
    @foreach ($comments as $comment)
        <div class="flex space-x-4">
            <div>
                <p class="mb-5">{{$comment->post_id}}</p>
                <p class="mb-5">{{ $comment->content }}</p>
            </div>
            <div class="flex flex-col ">
                <a href="{{ route('comments.edit',$comment->id), }}"
                    class="px-4 py-2 mb-1 text-md bg-blue-500 rounded-lg text-white shadow  text-center">Edit</a>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Delete"
                        class="px-4 py-2 mb-1 text-md bg-red-500  rounded-lg text-white shadow">
                </form>
            </div>
        </div>
    @endforeach
</x-app-layout>
