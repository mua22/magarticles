<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\AppController;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use YAAP\Theme\Theme;

class ArticlesController extends Controller
{
    public function index($category_slug = "directory"){

            //return $category_slug;
            $pageCategory = Category::findByTreeSlug($category_slug);
            if($pageCategory==null)
                throw new NotFoundHttpException();
        if($category_slug=="directory")
            $articles = Article::paginate(10);
        else
            $articles = $pageCategory->articles()->paginate(10);
            if($pageCategory->descendants){
                $categories = $pageCategory->children;
                //return $categories;

            }

        //return $articles;



       return view('site.articles.index',compact('articles','categories','pageCategory'));
    }
    public function show($id){
        $article = Article::findBySlug($id);
        //return $article;
        return view('site.articles.show',compact('article'));
    }

    public function create($tree_slug=null){
        //return "test";
        $tags = Tag::lists('name','id');
        $tags;
        $categories = Category::getSelectlist();

        $selected_id =  null;
        if($tree_slug!=null)
        {
            $category = Category::findByTreeSlug($tree_slug);
            $selected_id=$category->id;
        }
        ini_set('xdebug.max_nesting_level', 200);
        return view('site.articles.create',compact('tags','categories','selected_id'));
    }

    public function store(Requests\CreateArticles $request)
    {
        //return Auth::user()->articles;
        //return Auth::id();
        $input = $request->all() ;
        $tagIds =  $input['tags'];
        $article = new Article($input);
        $article = Auth::user()->articles()->save($article);
        $article = Article::findOrFail($article->id);
        if($tagIds)
        $article->tags()->attach($tagIds);
        //Article::create($input);
        //$article = new Article();
        //$article->title = $input['title'];
        //$article->body = $input['body'];
        //$article->published_at = Carbon::now();
        //$article->save();
        \Session::flash('flash_message','Article Saved Successfully');
        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit',compact('article'));
    }

    public function update($id,Requests\CreateArticles $request)
    {
        \Session::flash('flash_message','Article Saved Successfully');
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        return $user;
        // $user->token;
    }
}
