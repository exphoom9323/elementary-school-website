<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\PersinnelRequest;
use App\Http\Requests\PersinnelRequestEDIT;
class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('personnel.index')->with('users',User::all()->whereIn('type',['admin','teacher']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personnel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersinnelRequest $request)
    {
      User::create([
          'studentcode' => $request->studentcode,
          'idcard' => $request->idcard,
          'type' => $request->type,
          'titlename' => $request->titlename,
          'firstname' => $request->firstname,
          'lastname' => $request->lastname,
          'password' => Hash::make($request->idcard)
      ]);
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return view('personnel.index')->with('users',User::all()->whereIn('type',['admin','teacher']));
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
    public function edit(User $user)
    {
        return view('personnel.create')->with('users',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersinnelRequestEDIT $request, User $user)
    {
      $user->update([
          'idcard' => $request->idcard,
          'type' => $request->type,
          'titlename' => $request->titlename,
          'firstname' => $request->firstname,
          'lastname' => $request->lastname,
          'password' => Hash::make($request->idcard)
      ]);

      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return view('personnel.index')->with('users',User::all()->whereIn('type',['admin','teacher']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect(route('personnel.index'));
    }
}
