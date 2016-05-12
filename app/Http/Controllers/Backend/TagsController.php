<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Tag::all();
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
        $tag = \App\Tag::create($input);
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
        $record = \App\Tag::findOrfail($id);
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
        $tag = \App\Tag::findOrFail($id);
        $tag = $tag->fill($request->all())->save();
        if($tag) {
            \Session::flash('flash_message', 'Tag Created Updated');
            return redirect()->route('backend.tags.index');
        }else {
            \Session::flash('flash_message', 'Something Went Wrong');
            return redirect()->route('backend.tags.edit',$id);
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
        $tag = \App\Tag::find($id);
        if($tag) {
            $tag->delete($id);
            \Session::flash('flash_message', 'Tag deleted');
            return redirect()->route('backend.tags.index');
        } else {
            \Session::flash('flash_message','Failed to delete Tag');
            return redirect()->route('backend.tags.index');
        }
    }
}
