<?php 

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
	public function welcome()
	{
		return view('backend.dashboard');
	}
}