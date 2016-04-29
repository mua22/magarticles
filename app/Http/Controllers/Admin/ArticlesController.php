<?php namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateArticles;

class ArticlesController extends Controller
{
	public function create($tree_slug=null) {
		$tags = Tag::lists('name','id');
		$categories = Category::getSelectlist();
		$selected_id =  null;
		if($tree_slug!=null) {
			$category = Category::findByTreeSlug($tree_slug);
			$selected_id=$category->id;
		}
		return view('backend.admin.articles.create', compact('tags','categories','selected_id'));
	}

	public function store(CreateArticles $request) {

		$input = $request->all();

		$article = new Article();
		$article->title = $input['title'];
		$article->body = $input['body'];
		$article->slug = str_slug($input['title'], '-');
		$article->published_at = Carbon::now();
		$article->category_id = $input['category_id'];
		$article->user_id = Auth::user()->id;

		// Article safely created.
		if($article->save()) {
			// Check if have the tags.
			if(isset($input['tags'])) {
				$article->tags()->attach($input['tags']);
			}
			\Session::flash('flash_message','Article saved successfully');
			return redirect()->route('backend.welcome');
		}else {
			\Session::flash('flash_message','Article cannot be created');
			return redirect()->route('backend.welcome');
		}
	}
}