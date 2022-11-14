<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $blogs = Blog::paginate(9);
        return view('blogs')->with([
            'blogs' =>$blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $Request)
    {
        //

        Blog::create([
          'title'=>  $Request->title,
          'slug'=>  Str::slug($Request->body),
          'body'=>  $Request->body
        ]);
        return redirect()->route('blog')->with([
            'success' => 'safi rah tzad a bro'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show( $title)
    {
        $blog = Blog::where('title',$title)->first();
        return view('show')->with([
            'blog' =>$blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit( $title)
    {
        //
        $blog = Blog::where('title',$title)->first();
        return view('edit')->with([
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $Request, $title)
    {
        //
        $blog = Blog::where('title',$title)->first();
        $blog->update([
            'title'=>  $Request->title,
            'slug'=>  Str::slug($Request->body),
            'body'=>  $Request->body
          ]);
          return redirect()->route('blog')->with([
              'success' => 'safi rah t9ad a bro'
          ]);
      }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $title)
    {
        //
        $blog = Blog::where('title',$title)->first();
        
        if( $blog != null)
        {
          $blog->delete();
        }
        return redirect()->route('blog')->with([
            'success' => 'safi rah tmsa7 a bro'
        ]);

    }
}
