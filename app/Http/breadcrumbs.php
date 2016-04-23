<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});
Breadcrumbs::register('category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    //dd($category);
   // exit;
    foreach ($category->getAncestors() as $ancestor) {
        $breadcrumbs->push($ancestor->name, route('category', $ancestor->tree_slug));
    }

    $breadcrumbs->push($category->name, route('category', $category->tree_slug));
});
?>