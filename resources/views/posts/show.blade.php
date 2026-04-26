@php



// Get all posts for display
$allPosts = session('posts');
if(!isset($allPosts[$id])) {
abort(404);
}
$currentPost = $allPosts[$id];
var_dump($allPosts);
die;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post Stored - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen p-6 sm:p-8">
    <div class="max-w-xl mx-auto">
        <!-- Stats / Header -->
        <div class="mb-8">
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total posts in session: {{ count($allPosts) }}</p>
        </div>

        <!-- Post Card (Hyper UI Inspired) -->
        <article class="rounded-xl border border-gray-100 bg-white p-4 shadow-sm dark:border-gray-800 dark:bg-gray-800 sm:p-6 lg:p-8">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white sm:text-xl">
                        {{ $currentPost['title'] }}
                    </h3>

                    <p class="mt-1 text-xs font-medium text-gray-500 dark:text-gray-400">
                        Post ID: #{{ $currentPost['id'] }}
                    </p>
                </div>
            </div>

            <div class="mt-4 sm:mt-6">
                <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-wrap">
                    {{ $currentPost['content'] }}
                </p>
            </div>

            <div class="mt-8 flex items-center justify-between border-t border-gray-100 pt-4 dark:border-gray-700 sm:pt-6">

                <a href="/posts" class="text-xs font-bold uppercase tracking-widest text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                    View all posts
                </a>
            </div>
        </article>

        <!-- Actions (Hyper UI Inspired) -->
        <div class="mt-8 flex flex-wrap gap-4">
            <a
                href="/posts/create"
                class="inline-block rounded border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500 dark:hover:bg-blue-600/10 dark:hover:text-blue-400">
                Create Another Post
            </a>

            <a
                href="/posts/{{ $currentPost['id'] }}/edit"
                class="inline-block rounded border border-gray-200 px-12 py-3 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring active:text-gray-500 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                Edit Post
            </a>
        </div>

    </div>
</body>

</html>