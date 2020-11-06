<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectYear;
use App\Onet;
use App\User;

use App\WhYear;
use App\Wh;

class AdminController extends Controller
{
  public function index()
  {
      $user = User::all()->whereIn('studentyear',['k1','k2','k3','p1','p2','p3','p4','p5','p6']);
      return view('admin')
      ->with('onets',Onet::all())
      ->with('subjectyears',SubjectYear::all())
      ->with('users',$user)
      ->with('whyears',WhYear::all())
      ->with('whs',Wh::all())
      ->with('userMans',$user->whereIn('titlename',['เด็กชาย','นาย']))
      ->with('userFemales',$user->whereIn('titlename',['เด็กหญิง','นางสาว','นาง']));
  }
}
