<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Category;
Use App\Post;
Use App\Tag;
Use App\PostImage;
class PostController extends Controller
{
  public function search(){
        $search=request()->query('search');
        if ($search) {
          $posts=Post::where('title','LIKE',"%{$search}%")->orderBy('created_at', 'desc')->paginate(6);
        }else{
          $posts=Post::orderBy('created_at', 'desc')->paginate(6);
        }

        return view('blog.category')
        ->with('category',Category::all())
        ->with('tags',Tag::all())
        ->with('posts',$posts)
        ->with('postsAll',Post::all());
    }
  public function show(Post $post){
      $postimages = Post::all()->find($post->id)->postimages;
      return view('blog.show')
      ->with('post',$post)
      ->with('category',Category::all())
      ->with('posts',Post::all())
      ->with('tags',Tag::all())
      ->with('postimages',$postimages);
  }
    public function category(Category $category){

        return view('blog.category')
        ->with('posts',$category->posts()->orderBy('created_at', 'desc')->paginate(6))
        ->with('category',Category::all())
        ->with('postsAll',$category->posts())
        ->with('tags',Tag::all());

    }
    public function tag(Tag $tag){
        return view('blog.tag')
        ->with('posts',$tag->posts()->paginate(6))
        ->with('category',Category::all())
        ->with('tags',Tag::all());

    }
}
