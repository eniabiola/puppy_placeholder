<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Validate;
use Session;
use Image;
use File;

class PlaceholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('placeholder.index')->withArticles($articles);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //no create view as ther create form is on the index page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:120|min:5',
            'image' => 'required|image|mimes:jpeg,png,gif,svg|max:2048'
        ]);

        $article = new Article();
        $article->imageName = $request->name.'_'.time().'.'.$request->image->getClientOriginalExtension();
        if ($article->save()) {
            if ($request->image->move(public_path('images/puppies'), $article->imageName)) {
                return redirect() -> route('placeholder.index');
            }
        } else {
            return redirect() -> route('placeholder.index')->withInputs();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
