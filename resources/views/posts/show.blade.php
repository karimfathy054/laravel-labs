@php
$currentPost = $post;
@endphp

@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <div class="max-w-xl mx-auto">
        <!-- Post Card (Hyper UI Inspired) -->
        <article class="m-4 rounded-xl border border-gray-100 bg-white p-4 shadow-sm dark:border-gray-800 dark:bg-gray-800 sm:p-6 lg:p-8">
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

            @if ($currentPost['image'])
                <div class="mt-4 sm:mt-6">
                    <img src="{{ asset('storage/' . $currentPost['image']) }}" alt="{{ $currentPost['title'] }}" class="w-full rounded-lg shadow-sm">
                </div>
            @endif
        </article>

        {{-- creator data --}}
        <article class="m-4 rounded-xl border border-gray-100 bg-white p-4 shadow-sm dark:border-gray-800 dark:bg-gray-800 sm:p-6 lg:p-8">
                <div class="flex gap-4 mt-4">
                    <h2>Creator:</h2>
                    <p>{{ $post->creator->name ?? 'Deleted User' }}</p>
                </div>

                <div class="flex gap-4 mt-4">
                    <h2>Created At:</h2>
                    <p>{{ $post['created_at']->format('l jS \\of F Y h:i:s A') }}</p>
                </div>
            </div>
        </article>

    </div>
@endsection