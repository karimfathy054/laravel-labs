@php
    $allPosts=$posts;
@endphp

@extends('layouts.app')

@section('title', 'All Posts')

@section('content')

    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">All Posts</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    A list of all posts stored in your current session.
                </p>
            </div>

            <a
                href="/posts/create"
                class="inline-block rounded border border-blue-600 bg-blue-600 px-8 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500 dark:hover:bg-blue-600/10 dark:hover:text-blue-400">
                Create New Post
            </a>
        </div>

        <!-- Hyper UI Table Component -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm bg-white dark:bg-gray-900">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm dark:divide-gray-700 dark:bg-gray-900">
                <thead class="bg-gray-50 dark:bg-gray-800 ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-4 font-bold text-gray-900 dark:text-white text-left">Title</th>
                        <th class="whitespace-nowrap px-4 py-4 font-bold text-gray-900 dark:text-white text-left">Content Preview</th>
                        <th class="px-4 py-4"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($allPosts as $post)
                    <tr 
                        data-url="/posts/{{ $post['id'] }}"
                        class="clickable-row hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors cursor-pointer group"
                    >
                        <td class="whitespace-nowrap px-4 py-4 text-gray-700 dark:text-gray-200">
                            {{ $post['title'] }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-4 text-gray-700 dark:text-gray-200">
                            {{ Str::limit($post['content'], 60) }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-4 text-right flex justify-end gap-2">
                            <a
                                href="/posts/{{ $post['id'] }}"
                                class="inline-block rounded bg-blue-600 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700 transition-colors group-hover:bg-blue-700"
                            >
                                View
                            </a>

                            <a
                                href="/posts/{{ $post['id'] }}/edit"
                                class="inline-block rounded border border-gray-200 px-4 py-2 text-xs font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 transition-colors"
                                onclick="event.stopPropagation();"
                            >
                                Edit
                            </a>

                            <form 
                                action="/posts/{{ $post['id'] }}" 
                                method="POST" 
                                class="inline-block"
                                onsubmit="return confirm('Are you sure you want to delete this post?');"
                                onclick="event.stopPropagation();"
                            >
                                @csrf
                                @method('DELETE')
                                @if($post->trashed())
                                <button
                                    type="submit"
                                    class="inline-block rounded bg-green-600 px-4 py-2 text-xs font-medium text-white hover:bg-green-700 transition-colors"
                                >
                                    Restore
                                </button>
                                @else
                                <button
                                    type="submit"
                                    class="inline-block rounded bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700 transition-colors"
                                >
                                    Delete
                                </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 dark:text-gray-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 font-medium">No posts found. Start by creating your first post!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <td colspan="3" class="px-4 py-4 text-center">
                            {{ $allPosts->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.clickable-row');
            rows.forEach(row => {
                row.addEventListener('click', function(e) {
                    // Prevent navigation if the user clicked the specific View button (which has its own link)
                    if (e.target.tagName !== 'A') {
                        window.location = this.dataset.url;
                    }
                });
            });
        });
    </script>
@endsection