@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Bouton pour ouvrir la modal de création de post -->
    <div class="flex justify-end mb-4">
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-bs-toggle="modal" data-bs-target="#createPostModal">Add Post</button>
    </div>

    <!-- Modal de création de post -->
    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-darkblue">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="createPostModalLabel">Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <textarea name="body" class="form-control w-full p-2 border border-gray-300 rounded bg-darkblue-light text-white" rows="3" placeholder="What's on your mind?" required></textarea>
                        </div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Affichage des posts -->
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
