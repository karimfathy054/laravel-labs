@php
    // Get the current counter or start at 0
    $counter = session('post_id_counter', 0);
    $counter++;
    session(['post_id_counter' => $counter]);

    // Getting values from the request
    $newPost = [
        'id' => $counter,
        'title' => request('title'),
        'content' => request('content'),
    ];

    // Save in an associative array using the ID as the key
    $posts = session('posts', []);
    $posts[$counter] = $newPost;
    session(['posts' => $posts]);

    // Manually save the session before exiting
    // This is required because exit; prevents Laravel's automatic save
    session()->save();

    header("Location: /posts");
    exit;
@endphp