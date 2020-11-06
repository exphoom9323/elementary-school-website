<?php

namespace App\Http\Controllers;
use App\PostImage;
use App\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PostImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function store($id)
    {

      $post = Post::find($id);
      $name=request()->PostImages->store('posts/images');

      PostImage::create([
        'post_id'=>$post->id,
        'image'=>$name
      ]);
      return response()->json('[success=>/storage/'.$name.']');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postimages = Post::all()->find($id)->postimages;
       return view('postimage.index')->with('postimages',$postimages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);
         return view('postimage.create',compact('post','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {


     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostImage $postimage)
    {


      Storage::delete($postimage->image);
      $postimage->delete();

      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect()->back();
    }
}
