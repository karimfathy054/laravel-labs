@php
    $currentPost = $post;
@endphp

@extends('layouts.main')

@section('title', 'Edit Post')

@section('content')
    <div class="max-w-xl mx-auto">
        <!-- Breadcrumb / Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Post</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Update the details of your post below.
                </p>
            </div>

            <a href="/posts" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                Back to list
            </a>
        </div>

        <!-- Hyper UI Form Card -->
        <div class="rounded-lg bg-white p-8 shadow-lg dark:bg-gray-800 lg:col-span-3 lg:p-12 border border-gray-100 dark:border-gray-700">
            <form action="/posts/{{ $currentPost['id'] }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="sr-only" for="title">Title</label>
                    <input
                        class="w-full rounded-lg border-gray-200 p-3 text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all shadow-sm"
                        placeholder="Post Title"
                        type="text"
                        id="title"
                        name="title"
                        required
                        value="{{ $currentPost['title'] }}"
                    />
                    @error('title')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="sr-only" for="content">Content</label>
                    <textarea
                        class="w-full rounded-lg border-gray-200 p-3 text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all shadow-sm"
                        placeholder="Post Content"
                        rows="8"
                        id="content"
                        name="content"
                        required
                    >{{ $currentPost['content'] }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- drop down menu of post creator IDs --}}
                <div>
                    <label for="creator_id">Post Creator</label>
                    <select name="creator_id" id="creator_id" class="w-full rounded-lg border-gray-200 p-3 text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all shadow-sm">
                        <option value="{{ $currentPost['creator_id'] }}">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if($user->id == $currentPost['creator_id']) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('creator_id')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <button
                        type="submit"
                        class="inline-block w-full rounded-lg bg-blue-600 px-5 py-3 font-medium text-white sm:w-auto hover:bg-blue-700 transition-colors shadow-md active:scale-95"
                    >
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection