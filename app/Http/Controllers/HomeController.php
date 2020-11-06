<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //  $user=auth()->user(); //คนที่ลงชื่อเข้าใช้  Permission user=id
          //$user->givePermissionTo('key');
          // $user->syncPermissions(['key','key1']);
          // $user->revokePermissionTo('key');  //ลบ Permission

    //      dd($user->hasPermissionTo('key'));              //เชก Permission   แบบ true false
    //      dd($user->hasAllPermissions(['key','key1']));   //เชก Permission แบบหลายๆตัว



          //auth()->user()->assignRole('admin');  //กำหนด roles คนเข้าใช้ บทบาท ตำแหน่ง
          //auth()->user()->assignRole('admin');  //ลบ roles
          //auth()->user()->syncRoles(['admin','teacher']); //แบบเป็นกลุ่ม
          //auth()->user()->removeRoles(['admin','teacher']);

          // $user2=auth()->user();       //หรือ
          // $user2->assignRole('teacher');


          if(auth()->user()->hasRole("admin")){
              return view('home');
          }else{
            return view('home');
          }
    }
}
