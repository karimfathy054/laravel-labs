@php
    // Get all posts from session
    $posts = session('posts', []);

    // Update the specific post using its ID as the key
    if (isset($posts[$id])) {
        $posts[$id] = [
            'id' => $id,
            'title' => request('title'),
            'content' => request('content'),
        ];

        // Save the updated array back to session
        session(['posts' => $posts]);
        
        // REQUIRED: Save session before exit;
        session()->save();
    } else {
        abort(404, 'Post not found');
    }

    $currentPost = $posts[$id];
    header("Location: /posts");
    exit;
@endphp