<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\PostImage;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Middleware\VerifyCategory;

use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
         $this->middleware('VerifyCategory')->only(['create','store']);
     }
    public function index()
    {
        $post =  Post::orderBy('created_at', 'DESC')->get();
        return view('posts.index')
        ->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('posts.create')->with('category',Category::all())
      ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
      $image=$request->image->store('posts'); // $request->image คือรับรีเควสจาก image มาจาก <from>
      $post=Post::create([                           // ->store('posts'); store คือโฟเดอร์ storage ในโฟเดอร์ posts
          'title'=>$request->title,
          'description'=>$request->description,
          'content'=>$request->content,
          'image'=>$image,
          'category_id'=>$request->category_id
      ]);
      if($request->tags){                             //เพิ่มข้อมูลในตารางที่เชื่อมกันแบบ array
          $post->tags()->attach($request->tags);
      }
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {
      return view('posts.create')->with('post',$post)
      ->with('category',Category::all())
      ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
      $date=$request->only(['title','description','content','categort_id']);

      if($request->hasFile('image')){
          $image=$request->image->store('posts');
          $post->deleteImage();
          $date['image']=$image;
      }

      if($request->tags==null){
          $post->tags()->detach($post->post_id);


       } else if($request->tags){
          $post->tags()->sync($request->tags);

      }
      $post->update($date);

      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

      $query = PostImage::where('post_id',$post->id);
      $files_to_delete = $query->pluck('image')->toArray(); //ทำเป็น array
      Storage::delete($files_to_delete);
      $query->delete();   //ลบตารางรูป

      $post->tags()->detach();  //ลบ post_id ตาราง post_tag
      $post->deleteImage();//ลบรูปใน server
      $post->delete();
      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect(route('posts.index'));
    }
}
