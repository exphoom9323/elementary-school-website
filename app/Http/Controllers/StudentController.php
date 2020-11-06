<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Profile;
use DB;

use App\StudentYear;
use App\StudentScore;
use App\StudentCriteria;

use App\Subject;
use App\SubjectYear;

use App\WhYear;
use App\Wh;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentRequestEDIT;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if(SubjectYear::all()->whereIn('setting','checkon')->count()!=0){
        //   $check = DB::table('users')
        //   ->Join('student_years',  'users.id' , '=', 'student_years.user_id')
        //   ->where('student_years.result','checkon')
        //   ->where('users.type','student')
        //   ->select('users.*')
        //   ->get();
        //   return view('student.index')->with('users',User::all()->whereIn('type','student'))
        //   ->with('usercheckon',$check) ;
        //   }


      //  return view('student.index')->with('users',User::all()->whereIn('studentyear',['k1','k2','k3','p1','p2','p3','p4','p5','p6']));
        return view('student.index')->with('users',User::all()->whereIn('type','student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
      $user = User::create([
          'studentcode' => $request->studentcode,
          'idcard' => $request->idcard,
          'studentyear' => $request->studentyear,
          'titlename' => $request->titlename,
          'firstname' => $request->firstname,
          'lastname' => $request->lastname,
          'type' => 'student',
          'password' => Hash::make($request->idcard)
      ])->id;
       Profile::create([
          'user_id' => $user,
          'birthday' => $request->birthday,
          'race' => $request->race,
          'nationality' => $request->nationality,
          'cult' => $request->cult,
          'disease' => $request->disease,
          'HomeID' => $request->HomeID,
          'moo' => $request->moo,
          'village' => $request->village,
          'road' => $request->road,
          'parish' => $request->parish,
          'district' => $request->district,
          'province' => $request->province,
          'zipcode' => $request->zipcode,
          'father' => $request->father,
          'father_tel' => $request->father_tel,
          'father_job' => $request->father_job,
          'mother' => $request->mother,
          'mother_tel' => $request->mother_tel,
          'mother_job' => $request->mother_job,
          'guardian' => $request->guardian,
          'guardian_tel' => $request->guardian_tel,
          'guardian_job' => $request->guardian_job
      ]);

      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return view('student.index')->with('users',User::all()->whereIn('studentyear',['k1','k2','k3','p1','p2','p3','p4','p5','p6']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('student.show')->with('studentyears',StudentYear::all()->whereIn('user_id',$id))
        ->with('studentscores',StudentScore::all()->whereIn('user_id',$id))
        ->with('studentcriterias',StudentCriteria::all()->whereIn('user_id',$id))
        ->with('subject',Subject::all())
        ->with('subjectyear',SubjectYear::all())
        ->with('id',$id)
        ->with('whyears',WhYear::all())
        ->with('whs',Wh::all()->whereIn('user_id',$id))
        ->with('user',User::all()->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('student.create')
        ->with('users',$user)
        ->with('profile',Profile::all()->where('user_id',$user->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequestEDIT $request, User $user)
    {
      $user->update([

          'idcard' => $request->idcard,
          'studentyear' => $request->studentyear,
          'titlename' => $request->titlename,
          'firstname' => $request->firstname,
          'lastname' => $request->lastname,
          'password' => Hash::make($request->idcard)
      ]);

      $profile = Profile::all()->where('user_id',$user->id)->first();
      $profile->update([
          'birthday' => $request->birthday,
          'race' => $request->race,
          'nationality' => $request->nationality,
          'cult' => $request->cult,
          'disease' => $request->disease,
          'HomeID' => $request->HomeID,
          'moo' => $request->moo,
          'village' => $request->village,
          'road' => $request->road,
          'parish' => $request->parish,
          'district' => $request->district,
          'province' => $request->province,
          'zipcode' => $request->zipcode,
          'father' => $request->father,
          'father_tel' => $request->father_tel,
          'father_job' => $request->father_job,
          'mother' => $request->mother,
          'mother_tel' => $request->mother_tel,
          'mother_job' => $request->mother_job,
          'guardian' => $request->guardian,
          'guardian_tel' => $request->guardian_tel,
          'guardian_job' => $request->guardian_job
      ]);



      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return view('student.index')->with('users',User::all()->whereIn('studentyear',['k1','k2','k3','p1','p2','p3','p4','p5','p6']));
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
      return redirect(route('student.index'));
    }



    public function score(Request $request,$id)
    {

      foreach(StudentScore::all()->whereIn('user_id',$id) as $studentscore){
        $save = Subject::all()->find($studentscore->subject_id)->id;
        $studentscore->update([
          'score' => $request->$save
          ]);
      }

      foreach(StudentCriteria::all()->whereIn('user_id',$id) as $studentcriteria){
        $saves = Subject::all()->find($studentcriteria->subject_id)->id;
        $studentcriteria->update([
          'criteria' => $request->$saves
          ]);
      }

      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('student.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
