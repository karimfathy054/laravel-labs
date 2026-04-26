@php
$allPosts = session('posts');
unset($allPosts[$id]);
session(['posts' => $allPosts]);
session()->save();
header("Location: /posts");
exit;
@endphp