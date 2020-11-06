<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\AlbumImage;

use Illuminate\Support\Facades\Storage;
class AlbumImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$studentyear)
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
      $album = Album::find($id);
      $name=request()->AlbumImages->store('album');

      AlbumImage::create([
        'album_id'=>$album->id,
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
          $albumimages = Album::all()->find($id)->albumimages;
          return view('albumimage.index')->with('albumimages',$albumimages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $album = Album::find($id);
      return view('albumimage.create',compact('album','id'));
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
    public function destroy(AlbumImage $albumimage)
    {
      Storage::delete($albumimage->image);
      $albumimage->delete();

      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect()->back();
    }
}
