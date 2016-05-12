<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function homepage()
	{
		$articles = Article::paginate(10);
      $categories = Category::all();
		return view('frontend.home',compact('articles', 'categories'));
	}
}
