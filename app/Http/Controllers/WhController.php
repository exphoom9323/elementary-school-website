<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhYear;
use App\Wh;
use App\User;
use App\SubjectYear;
use DB;


class WhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WhYear = WhYear::orderBy('date')->get();
        return view('weight-height.index')->with('whyears',$WhYear);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weight-height.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $whyear = WhYear::create([
        'date'=>$request->date
      ])->id;

      foreach(User::all()->whereIn('studentyear',['k1','k2','k3','p1','p2','p3','p4','p5','p6']) as $user){
          if(!empty($user->studentyear)){
              Wh::create([
              'wh_year_id'=>$whyear,
              'user_id'=>$user->id
            ]);
        }
      }

      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('wh.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($whyear)
    {
      $id = SubjectYear::all()->whereIn('setting',[null,'on','checkon','create'])->first();
      if($id->count() == 0){
        Session()->flash('error','ยังไมได้อยู่เชื่องปีการศึกษา');
        return redirect(route('wh.index'));
      }


      $Tclasses = DB::table('tclass_user')
      ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
      ->where('tclasses.subject_year_id', '=',$id->id)
      ->select('tclass_user.user_id as user_id','tclasses.studentyear as studentyear')
      ->get();





        $whyear = WhYear::findOrFail($whyear);
        return view('weight-height.show')->with('users',User::all()->whereIn('studentyear',['k1','k2','k3','p1','p2','p3','p4','p5','p6']))
        ->with('whs',Wh::all()->whereIn('wh_year_id',$whyear->id))
        ->with('whyear',$whyear->id)
        ->with('whyearDate',$whyear->date)
        ->with('Tclasses',$Tclasses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($whyear)
    {
      $whyear = WhYear::findOrFail($whyear);
      return view ('weight-height.create', compact ('whyear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$whyear)
    {
      $whyear = WhYear::findOrFail($whyear);
      $whyear->update([
        'date'=>$request->date
      ]);
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('wh.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($whyear)
    {
      $whyear = WhYear::findOrFail($whyear);

      foreach(Wh::all() as $wh){
          if($whyear->id == $wh->wh_year_id){
            $wh->delete();
        }
      }

      $whyear->delete();
      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect(route('wh.index'));
    }

    public function score(Request $request,$class,$whyear)
    {

      foreach(User::all()->whereIn('studentyear',$class) as $user){
        foreach(Wh::all()->whereIn('wh_year_id',$whyear)->whereIn('user_id',$user->id) as $wh){

          $weight = 'weight'.$user->id;
          $height = 'height'.$user->id;
          $wh->update([
            'weight' => $request->$weight,
            'height' => $request->$height,
            ]);
        }
      }

      $whyear = WhYear::findOrFail($whyear);
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('wh.show',$whyear->id));
    }
}
