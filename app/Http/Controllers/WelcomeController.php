<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Category;
Use App\Post;
Use App\Tag;
Use App\File;
Use App\Album;
Use App\AlbumImage;

use App\User;
use App\Profile;

use App\StudentYear;
use App\StudentScore;
use App\StudentCriteria;

use App\Subject;
use App\SubjectYear;

use App\WhYear;
use App\Wh;

use App\Onet;



class WelcomeController extends Controller
{
    public function index(){

      $posts=Post::orderBy('created_at', 'desc')->paginate(6);
      return view('welcome')
      ->with('category',Category::all())
      ->with('posts',$posts) //paginate แสดงต่อหน้า
      ->with('tags',Tag::all())
      ->with('files',File::all())
      ->with('albums',Album::all())
      ->with('albumimages',AlbumImage::all());
    }
    public function contact(){
      return view('contact')
      ->with('category',Category::all());
    }
    public function listalbum(){
      return view('listalbum')
      ->with('category',Category::all())
      ->with('albums',Album::all())
      ->with('albumimages',AlbumImage::all());
    }
    public function showalbum(Album  $album){
      $albumimages = Album::all()->find($album->id)->albumimages;
      return view('showalbum')
      ->with('category',Category::all())
      ->with('album',$album)
      ->with('albumimages',$albumimages);
    }
    public function history(){
      $user = User::all()->whereIn('studentyear',['k1','k2','k3','p1','p2','p3','p4','p5','p6']);

      $subjectyearsGPA =  SubjectYear::all()->whereIn('setting','finish');
      return view('history')
      ->with('category',Category::all())
      ->with('tags',Tag::all())
      ->with('onets',Onet::all())
      ->with('subjectyears',SubjectYear::all())
      ->with('users',$user)
      ->with('whyears',WhYear::all())
      ->with('whs',Wh::all())
      ->with('userMans',$user->whereIn('titlename',['เด็กชาย','นาย']))
      ->with('userFemales',$user->whereIn('titlename',['เด็กหญิง','นางสาว','นาง']))
      ->with('subjectyearsGPA',$subjectyearsGPA)
      ->with('studentyears',StudentYear::all());
    }
    public function profile($id){
      return view('profile')
      ->with('category',Category::all())->with('studentyears',StudentYear::all()->whereIn('user_id',$id))
      ->with('studentscores',StudentScore::all()->whereIn('user_id',$id))
      ->with('studentcriterias',StudentCriteria::all()->whereIn('user_id',$id))
      ->with('subject',Subject::all())
      ->with('subjectyear',SubjectYear::all())
      ->with('id',$id)
      ->with('whyears',WhYear::all())
      ->with('whs',Wh::all()->whereIn('user_id',$id))
      ->with('user',User::all()->find($id));
    }

}
