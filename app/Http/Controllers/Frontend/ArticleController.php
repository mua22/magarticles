<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\ArticlesRepository;

class ArticleController extends Controller
{

    private $articlesRepo;

    public function __construct (ArticlesRepository $articlesRepo)
    {
        $this->articlesRepo = $articlesRepo;
    }


    public function show($slug) {

        $article = $this->articlesRepo->findBy('slug', $slug);

        if($article) {
            return view('frontend.articles.show', compact('article'));
        }

        // TODO: Handle errors correctly.
        return 'Article not found';
    }
}
