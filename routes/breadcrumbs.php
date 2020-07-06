<?php
// Home
Breadcrumbs::for('main', function ($trail) {
    $trail->push('Home', route('main'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('main');
    $trail->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('main');
    $trail->push('Blog', route('blog.index'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->slug));
});
