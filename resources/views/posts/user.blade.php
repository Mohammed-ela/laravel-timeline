@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-white mb-4">My Posts</h1>
    <!-- Affichage des posts de l'utilisateur -->
    <div class="mt-6 bg-darkblue-light overflow-hidden shadow-sm sm:rounded-lg">
        @foreach($posts as $post)
            <div class="p-6 bg-darkblue border-b border-gray-600 mb-4 rounded">
                <div class="flex justify-between items-center">
                    <div>
                        <h5 class="text-xl font-bold text-white">{{ $post->user->name }}</h5>
                        <p class="mt-2 text-gray-200">{{ $post->body }}</p>
                        <p class="text-sm text-gray-400 mt-2">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        @if ($post->user_id == Auth::id())
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <form action="{{ $post->likes->where('user_id', Auth::id())->count() ? route('posts.unlike', $post) : route('posts.like', $post) }}" method="POST">
                        @csrf
                        @if($post->likes->where('user_id', Auth::id())->count())
                            @method('DELETE')
                            <button type="submit" class="flex items-center text-red-500 hover:text-red-700 font-bold py-2 px-4 rounded">
                                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656l-7.656 7.656-7.656-7.656a4 4 0 010-5.656z" />
                                </svg>
                                <span class="ml-1">Unlike</span>
                            </button>
                        @else
                            <button type="submit" class="flex items-center text-blue-500 hover:text-blue-700 font-bold py-2 px-4 rounded">
                                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656l-7.656 7.656-7.656-7.656a4 4 0 010-5.656z" />
                                </svg>
                                <span class="ml-1">Like</span>
                            </button>
                        @endif
                    </form>
                    <span class="text-sm text-gray-400">{{ $post->likes_count }} {{ Str::plural('like', $post->likes_count) }}</span>
                </div>
            </div>
        @endforeach

        <div class="mt-6 p-4">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
