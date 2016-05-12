<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TagsRepository;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{

    private $tagsRepo;

    public function __construct (TagsRepository $tagsRepo)
    {
        $this->tagsRepo = $tagsRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = $this->tagsRepo->all();
        return view('backend.tags.index')->with(compact('records'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $tag = $this->tagsRepo->create($input);
        if($tag)
        {
            \Session::flash('flash_message','Tag Created Successfully');
            return redirect()->route('backend.tags.index');
        } else {
            \Session::flash('flash_message','Tag was not Created');
            return redirect()->route('backend.tags.create');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = $this->tagsRepo->find($id);
        return view('backend.tags.edit')->with(compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = $this->tagsRepo->find($id);

        if($tag) {
            $input = $request->except(['_token', '_method']);
            $tag = $this->tagsRepo->update($input, $tag->id);
            \Session::flash('flash_message', 'Tag Created Updated');
            return redirect()->route('backend.tags.index');
        }else {
            \Session::flash('flash_message', 'Something Went Wrong');
            return redirect()->route('backend.tags.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = $this->tagsRepo->find($id);
        if($tag) {
           $this->tagsRepo->delete($id);
            \Session::flash('flash_message', 'Tag deleted');
            return redirect()->route('backend.tags.index');
        } else {
            \Session::flash('flash_message','Failed to delete Tag');
            return redirect()->route('backend.tags.index');
        }
    }
}
