<?php 

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateArticles;
use App\Repositories\ArticlesRepository;
use App\Repositories\TagsRepository;
use App\Repositories\CategoryRepository;

class ArticlesController extends Controller
{

	private $articlesRepo;

	private $tagsRepo;

	private $categoryRepo;

	public function __construct (
		ArticlesRepository $articlesRepo,
		TagsRepository $tagsRepo,
		CategoryRepository $categoryRepo
		)
	{
		$this->articlesRepo = $articlesRepo;
		$this->tagsRepo = $tagsRepo;
		$this->categoryRepo = $categoryRepo;
	}

	public function index()
	{
		$articles = $this->articlesRepo->paginate(10);
		return view('backend.articles.index', compact('articles'));
	}

    public function create()
    {
    	$tagsList = $this->tagsRepo->lists('name', 'id');
		$categoryList = $this->categoryRepo->getSelectlist();
		return view('backend.articles.create', compact('tagsList','categoryList'));
    }

    public function store(CreateArticles $request)
    {
    	$input = $request->all();
    	$article = $this->articlesRepo->create($input);

    	if($article) {
    		\Session::flash('flash_message','Article saved successfully');
    		return redirect()->route('backend.articles.index');
    	}
    	\Session::flash('flash_message','Article cannot be created');
    	return redirect()->route('backend.articles.index');
    }

    public function edit($id)
    {
        $article = $this->articlesRepo->find($id);

        if($article) {
        	$tagsList = $this->tagsRepo->lists('name', 'id');
        	$categoryList = $this->categoryRepo->getSelectlist();
        	return view('backend.articles.edit', compact('article','tagsList','categoryList'));
        } else {
        	\Session::flash('flash_message','Article not found');
    		return redirect()->route('backend.articles.index');
        }
    }

    public function update(CreateArticles $request, $id)
    {
    	$article = $this->articlesRepo->find($id);

    	if($article) {
    		$input = $request->except(['_token', '_method']);
    		$article = $this->articlesRepo->update($input, $id);

            if($article) {
                \Session::flash('flash_message', 'Article updated');
                return redirect()->route('backend.articles.edit', $id);
            }
    	} else {
    		\Session::flash('flash_message','Failed to update article');
    		return redirect()->route('backend.articles.index');
    	}
    }

    public function destroy($id)
    {
    	$article = $this->articlesRepo->find($id);
    	if($article) {
    		$this->articlesRepo->delete($id);
	    	\Session::flash('flash_message', 'Article deleted');
    		return redirect()->route('backend.articles.index');
    	} else {
    		\Session::flash('flash_message','Failed to update article');
    		return redirect()->route('backend.articles.index');
    	}
    }
}