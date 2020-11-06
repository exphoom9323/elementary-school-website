<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\AlbumImage;
use App\Http\Requests\CreateAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;

use Illuminate\Support\Facades\Storage;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('album.index')->with('albums',Album::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAlbumRequest $request)
    {
      Album::create(['name'=>$request->name]);
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('album.index'));
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
    public function edit(Album $album)
    {
        return view('album.create')->with('album',$album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
      $album->update([
        'name'=>$request->name
      ]);
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('album.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {

      $query = AlbumImage::where('album_id',$album->id);
      $files_to_delete = $query->pluck('image')->toArray(); //ทำเป็น array
      Storage::delete($files_to_delete);
      $query->delete();   //ลบตารางรูป

      $album->delete();
      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect(route('album.index'));
    }
}
