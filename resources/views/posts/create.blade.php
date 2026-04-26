<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Post - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen p-6 sm:p-8">
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

                <div class="mt-4">
                    <button
                        type="submit"
                        class="inline-block w-full rounded-lg bg-blue-600 px-5 py-3 font-medium text-white sm:w-auto hover:bg-blue-700 transition-colors shadow-md active:scale-95">
                        Create Post
                    </button>
                </div>
            </form>
        </div>

        <!-- Tip -->
        <div class="mt-8 rounded-lg bg-blue-50 p-4 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800">
            <div class="flex items-center gap-2 text-blue-600 dark:text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs font-bold uppercase tracking-widest">Session Storage</p>
            </div>
            <p class="mt-1 text-sm text-blue-700 dark:text-blue-300">
                Data is stored in your browser session and will be lost when you clear your cache.
            </p>
        </div>
    </div>
</body>

</html>