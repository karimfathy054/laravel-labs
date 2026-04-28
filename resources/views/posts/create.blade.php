@extends('layouts.main')

@section('title', 'Create New Post')

@section('content')

    <div class="max-w-xl mx-auto">
        <!-- Breadcrumb / Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create New Post</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Fill in the details below to add a new post to the session.
                </p>
            </div>

            <a href="/posts" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                Back to list
            </a>
        </div>

        <!-- Hyper UI Form Card -->
        <div class="rounded-lg bg-white p-8 shadow-lg dark:bg-gray-800 lg:col-span-3 lg:p-12 border border-gray-100 dark:border-gray-700">
            <form action="/posts" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="sr-only" for="title">Title</label>
                    <input
                        class="w-full rounded-lg border-gray-200 p-3 text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all shadow-sm"
                        placeholder="Post Title"
                        type="text"
                        id="title"
                        name="title"
                        required />
                </div>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

                <div>
                    <label class="sr-only" for="content">Content</label>
                    <textarea
                        class="w-full rounded-lg border-gray-200 p-3 text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all shadow-sm"
                        placeholder="Post Content"
                        rows="8"
                        id="content"
                        name="content"
                        required></textarea>
                </div>

                @error('content')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

                {{-- drop down menu of post creator IDs --}}
                <div>
                    <label for="user_id">Post Creator</label>
                    <select name="user_id" id="user_id" class="w-full rounded-lg border-gray-200 p-3 text-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all shadow-sm">
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <button
                        type="submit"
                        class="inline-block w-full rounded-lg bg-blue-600 px-5 py-3 font-medium text-white sm:w-auto hover:bg-blue-700 transition-colors shadow-md active:scale-95">
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection