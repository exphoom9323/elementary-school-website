<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\UpdateFileRequest;

use Illuminate\Support\Facades\Storage;//delete file

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.index')->with('files',File::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFileRequest $request)
    {
      $fileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
      $fullFileName = $fileName.'.'.$request->file->getClientOriginalExtension();

      $file=$request->file->store('file');

      $file=File::create([
          'title'=>$request->title,
          'description'=>$request->description,
          'file'=>$file,
          'name'=>$fullFileName
      ]);
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('files.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
              $path = storage_path('app/public/'.$file->file);
              return response()->download($path,$file->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('files.create')->with('file',$file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
      if($request->hasFile('file')){
          $files=$request->file->store('file');
          Storage::delete($file->file);

          $fileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
          $fullFileName = $fileName.'.'.$request->file->getClientOriginalExtension();

          $file->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'file'=>$files,
            'name'=>$fullFileName
          ]);
      }else{
        $date=$request->only(['title','description']);
        $file->update($date);
      }

        Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
        return redirect(route('files.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {

      //unlink(storage_path().'/'.'app'.'/public/'.$file->file);
      Storage::delete($file->file);

      $file->delete();
      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect(route('files.index'));


      // Session()->flash('success','ลบข้อมูลเรียบร้อย');
      // return redirect(route('files.index'));

    }

}
