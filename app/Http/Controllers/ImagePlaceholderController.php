<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Session;
use Image;
use File;

class ImagePlaceholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($articles = Article::take(2)->get()) {
            $ids = $articles->pluck('id')->all();
            return view('index')->withIds($ids);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function show($width = "", $height = "") {
        $article = Article::inRandomOrder()->first();
        $storagePath = public_path('images\puppies\\').$article->imageName;

        if ($width != "" && $height != "") {
            if (File::exists($storagePath)) {
                $width = $width;
                $height =$height;
                $img = Image::cache(function($image) use($storagePath, $width, $height) {
                   $image->make($storagePath)->resize($width, $height);
                }, 10, true);
                return $img->response();
            }
        }elseif ($width != "" || $height != "") {
            if ($width != "") {
                $height = $width;
            } else {
                $width = $height;
            }
            if (File::exists($storagePath)) {
                $width = $width;
                $height =$height;
                $img = Image::cache(function($image) use($storagePath, $width, $height) {
                   $image->make($storagePath)->resize($width, $height);
                }, 10, true);
                return $img->response();
            }
        } else {
            
            return redirect()-> route('index');
            }
        }


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
 
public function indexShow($slug) {
        $article = Article::where('id', $slug)->get();
        $imageName =  $article->pluck('imageName');
        
        $storagePath = public_path('images\puppies\\').$imageName[0];
        if (File::exists($storagePath)) 
        {
            $img = Image::cache(function($image) use($storagePath) {
               $image->make($storagePath)->resize(500, 350);
            }, 10, true);
            return $img->response();
        } else {
            dd("not found");
        }
    }

}