<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use App\SubjectYear;
use App\Subject;
use App\User;
use App\StudentYear;
use App\StudentScore;
use App\StudentCriteria;
use App\Onet;
use App\Tclass;

use App\Http\Requests\OnetRequest;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$studentyear)
    {
          $subjectyears = SubjectYear::all()->find($id);
          $subjecs = Subject::all()->find($studentyear);
          return view('subject.create')
          ->with(compact('subjectyears','id'))            //->with('subjectyear',compact('subjectyears','id'))
          ->with(compact('subjecs','studentyear'));           // ->with('subjec',compact('subjecs','studentyear'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$studentyear)
    {
      $subjectyear = SubjectYear::find($id);
      Subject::create([
        'name'=>$request->name,
        //'type'=>$request->type,
        'type'=>'score',
        'subject_year_id'=>$subjectyear->id,
        'studentyear'=>$studentyear,
        'credit'=>$request->credit,
      ]);

      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('subject.show',compact($subjectyear->id,'id')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tclass $id)
    {
        $subjectyears = SubjectYear::all()->find($id->id)->subjects;
       // $TclassK1 = Tclass::with('homeroom')->where('subject_year_id',$id->id)->where('studentyear','k1')->get();
        $TclassK1 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','k1')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();
        $TclassK2 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','k2')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();
        $TclassK3 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','k3')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();
        $TclassP1 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','p1')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();
        $TclassP2 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','p2')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();
        $TclassP3 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','p3')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();
        $TclassP4 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','p4')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();
        $TclassP5 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','p5')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();
        $TclassP6 = DB::table('tclass_user')
        ->Join('tclasses',  'tclass_user.tclass_id' , '=', 'tclasses.id')
        ->Join('users',  'tclass_user.user_id' , '=', 'users.id')
        ->where('tclasses.studentyear','p6')
        ->where('tclasses.subject_year_id',$id->id)
        ->select('tclass_user.user_id')
        ->get();





       return view('subject.index',compact('subjectyears','id'))
       ->with('subjectyears',$subjectyears)
       ->with('teacher',SubjectYear::find($id->id))
       ->with('onet',Onet::find($id->id))
       ->with('SubjectYearName',SubjectYear::all()->find($id->id))
       ->with('usersTeachers',User::all()->whereIn('type',['admin','teacher']))
       ->with('TclassK1',$TclassK1)->with('TclassK2',$TclassK2)->with('TclassK3',$TclassK3)
       ->with('TclassP1',$TclassP1)->with('TclassP2',$TclassP2)->with('TclassP3',$TclassP3)
       ->with('TclassP4',$TclassP4)->with('TclassP5',$TclassP5)->with('TclassP6',$TclassP6);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Subject $subject)
    {
        return view('subject.create')->with('subject',$subject)
        ->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,$studentyear)
    {


      foreach(Subject::all()->whereIn('subject_year_id',$id) as $subject){

        if($subject->studentyear == $studentyear ){

          $subjectName = 'name'.$subject->id;
          $subjectcredit = 'credit'.$subject->id;
          $subjectID = $subject->id;

          if($request->$subjectcredit != NULL){
            $this->validate($request,[
              $subjectcredit  => [ 'regex:/[0-5]$/' ],
            ]);
          }

          $subject->update([
            'name' => $request->$subjectName,
            'credit' => $request->$subjectcredit,
            ]);


        }

      }
      // $subject->update([
      //   'name'=>$request->name,
      //   //'type'=>$request->type
      //   'credit'=>$request->credit
      // ]);
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('subject.show',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Subject $subject)
    {
      $subject->delete();
      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect(route('subject.show',$id));
    }


    public function finish($id)
    {

            $x = null;
            foreach(User::all()->whereIn('studentyear',['p1','p2','p3','p4','p5','p6']) as $user){
              foreach(StudentYear::all() as $studentyear){
                if($studentyear->user_id == $user->id && $studentyear->subject_year_id == $id) {
                     foreach(StudentScore::all() as $studentscore){
                       if($studentscore->student_years_id == $studentyear->id && $studentscore->user_id == $user->id      && $studentscore->score == null){
                         SubjectYear::where('id', $id)->update(['setting'=>'checkon']);
                          StudentYear::where('id', $studentyear->id)->update(['result'=>'checkon']);
                          $x = '1';
                       }
                     }
                     foreach(StudentCriteria::all() as $studentcriteria){
                       if($studentcriteria->student_years_id == $studentyear->id  && $studentcriteria->user_id == $user->id    && $studentcriteria->criteria == null){
                         SubjectYear::where('id', $id)->update(['setting'=>'checkon']);
                         StudentYear::where('id', $studentyear->id)->update(['result'=>'checkon']);
                         $x = '1';
                       }
                     }
                }
              }
            }
            if($x == '1'){
              Session()->flash('error','ยังมีนักเรียนที่กรองข้อมูลเกรดไม่ครบ');
              return redirect(route('subject.show',$id));
            }




    foreach(User::all()->whereIn('studentyear',['k1','k2','k3']) as $user){
      if($user->studentyear == 'k1'){
         $user->update(['studentyear'=>'k2']);
      }else if($user->studentyear == 'k2'){
         $user->update(['studentyear'=>'k3']);
      }else if($user->studentyear == 'k3'){
         $user->update(['studentyear'=>'p1']);
      }
    }
     foreach(User::all()->whereIn('studentyear',['p1','p2','p3','p4','p5','p6']) as $user){
       $scores = null;
       $score = array();
       $creditAll_sum = array();
       $answer_sum = array();
       $criteria = array();

       foreach(StudentYear::all() as $studentyear){

         if($studentyear->user_id == $user->id && $studentyear->subject_year_id == $id) {
              foreach(StudentScore::all() as $studentscore){
                if($studentscore->student_years_id == $studentyear->id && $studentscore->user_id == $user->id){
                    $credit = Subject::all()->where('id',$studentscore->subject_id)->first()->credit;
                    if($credit == '-1'){ // เก็บค่า 0 ใน MySQL คือค่า  NULL
                      $credit == '0';
                    }
                    array_push($creditAll_sum,$credit);
                    $creditAll = array_sum($creditAll_sum);

                    $answer = $studentscore->score*$credit;
                    array_push($answer_sum,$answer);
                }
              }
              $scores = array_sum($answer_sum)/$creditAll;
              $val = $studentyear->studentyear;

            if(SubjectYear::find($studentyear->subject_year_id)->$val <= $scores ){
                array_push($criteria,"ผ่าน");
            }else {
              array_push($criteria,"ไม่ผ่าน");
            }


            foreach(StudentCriteria::all() as $studentcriteria){
              if($studentcriteria->student_years_id == $studentyear->id  && $studentcriteria->user_id == $user->id){
                  array_push($criteria,$studentcriteria->criteria);
              }

            }

            if(in_array("ไม่ผ่าน",$criteria)) {
              $studentyear->update(['result'=>'Unsuccessful','GPA'=>$scores]);
            }
            else{

              if($user->studentyear == 'k1'){
                 $user->update(['studentyear'=>'k2']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }else if($user->studentyear == 'k2'){
                 $user->update(['studentyear'=>'k3']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }else if($user->studentyear == 'k3'){
                 $user->update(['studentyear'=>'p1']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }else if($user->studentyear == 'p1'){
                 $user->update(['studentyear'=>'p2']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }else if($user->studentyear == 'p2'){
                 $user->update(['studentyear'=>'p3']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }else if($user->studentyear == 'p3'){
                 $user->update(['studentyear'=>'p4']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }else if($user->studentyear == 'p4'){
                 $user->update(['studentyear'=>'p5']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }else if($user->studentyear == 'p5'){
                 $user->update(['studentyear'=>'p6']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }elseif($user->studentyear == 'p6'){
                 $user->update(['studentyear'=>'จบการศึกษา']);
                 $studentyear->update(['result'=>'Successful','GPA'=>$scores]);
              }

            }

         }
       }


     }
     SubjectYear::where('id', $id)->update(['setting'=>'finish']);
      Session()->flash('success','เพิ่มเรียบร้อย');
        return redirect(route('subject.show',$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function open($id)
     {

       if(Subject::all()->where('type','score')->where('subject_year_id',$id)->where('credit',null)->count()!=0){

           Session()->flash('error','มีวิชาที่ยังไม่ได้กรองหน่วยกิต');
             return redirect(route('subject.show',$id));
       }



       SubjectYear::where('id', $id)->update(['setting'=>'on']);
       foreach(User::all()->whereIn('studentyear',['p1','p2','p3','p4','p5','p6']) as $user){
          if(!empty($user->studentyear)){

            $StudentYear = StudentYear::create([
              'subject_year_id'=>$id,
              'studentyear'=>$user->studentyear,
              'user_id'=>$user->id
            ])->id;


                foreach(Subject::all() as $subject){
                  if($subject->subject_year_id == $id && $subject->studentyear == $user->studentyear){

                    if($subject->type == 'score'){
                      StudentScore::create([
                        'student_years_id'=>$StudentYear,
                        'subject_id'=>$subject->id,
                        'user_id'=>$user->id
                      ]);
                    }else{
                      StudentCriteria::create([
                        'student_years_id'=>$StudentYear,
                        'subject_id'=>$subject->id,
                        'user_id'=>$user->id
                      ]);
                    }

                  }
                }




          }
       }


       Session()->flash('success','หลักสูตรถูกเปิดใช้งานแล้ว');
       return redirect(route('subject.show',$id));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */


/*------------------------------------------------------*/

      public function createOnet($id)
      {
            $subjectyears = SubjectYear::all()->find($id);
            return view('subject.create-onet')           //->with('subjectyear',compact('subjectyears','id'))
            ->with(compact('subjectyears','id'));           // ->with('subjec',compact('subjecs','studentyear'));
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */

       public function storeOnet(OnetRequest $request,$id)
       {
         $subjectyear = SubjectYear::find($id);
         Onet::create([
           'thai'=>$request->thai,
           'eng'=>$request->eng,
           'mathematics'=>$request->mathematics,
           'science'=>$request->science,
           'allthai'=>$request->allthai,
           'alleng'=>$request->alleng,
           'allmathematics'=>$request->allmathematics,
           'allscience'=>$request->allscience,
           'subject_year_id'=>$subjectyear->id,
         ]);

         Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
         return redirect(route('subject.show',compact($subjectyear->id,'id')));
       }

       /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function editOnet($id,Onet $onet)
        {
          return view('subject.create-onet')->with('onet',$onet)
          ->with('id',$id);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */

         public function updateOnet(OnetRequest $request,$id)
         {
           $subjectyear = SubjectYear::find($id);
           $onet = Onet::find($id);
           $onet->update([
             'thai'=>$request->thai,
             'eng'=>$request->eng,
             'mathematics'=>$request->mathematics,
             'science'=>$request->science,
             'allthai'=>$request->allthai,
             'alleng'=>$request->alleng,
             'allmathematics'=>$request->allmathematics,
             'allscience'=>$request->allscience,
           ]);
           Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
           return redirect(route('subject.show',compact($subjectyear->id,'id')));
         }

         /**
          * Remove the specified resource from storage.
          *
          * @param  int  $id
          * @return \Illuminate\Http\Response
          */
          public function homeroom(Request $request,$id)
          {
            $subjectyear = SubjectYear::find($id);

        foreach(Tclass::all() as $tclass){

          if($tclass->subject_year_id == $subjectyear->id) {

            for($i = 1; $i <= 3; $i++){
              $kAll = 'k'.$i;
              if($tclass->studentyear == $kAll) {
                      if($request->$kAll==null){
                          $tclass->homeroom()->detach($tclass->user_id);
                       } else if($request->$kAll){
                          $tclass->homeroom()->sync($request->$kAll);
                       }
              }
            }
            for($i = 1; $i <= 6; $i++){
              $pAll = 'p'.$i;
              if($tclass->studentyear == $pAll) {
                      if($request->$pAll==null){
                          $tclass->homeroom()->detach($tclass->user_id);
                       } else if($request->$pAll){
                          $tclass->homeroom()->sync($request->$pAll);
                       }
              }
            }


        }

        }


            Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
            return redirect(route('subject.show',compact($subjectyear->id,'id')));
          }




          public function grade(Subject $subject)
          {
            if($subject->type == 'score'){
              $type = StudentScore::all()->whereIn('subject_id',$subject->id);
              $thetype = 'score';
            }else{
              $type = StudentCriteria::all()->whereIn('subject_id',$subject->id);
              $thetype = 'criteria';
            }




            return view('subject.grade')
            ->with('subject',Subject::find($subject->id))
            ->with('users',User::all()->whereIn('type','student'))
            ->with('types',$type)
            ->with('SubjectYear',SubjectYear::all())
            ->with('thetype',$thetype);
          }

          public function updategrade(Request $request,$thetype,Subject $subject,$id)
          {
            $subjectyear = SubjectYear::find($id);
              if($thetype == 'score'){
                $types = StudentScore::all()->whereIn('subject_id',$subject->id);
                foreach($types as $type){
                  $save = $type->id;
                  $type->update([
                    'score' => $request->$save
                    ]);
                }
              }else{
                  $types = StudentCriteria::all()->whereIn('subject_id',$subject->id);
                  foreach($types as $type){
                    $save = $type->id;
                    $type->update([
                      'criteria' => $request->$save
                      ]);
              }
            }
              Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
              return redirect(route('subject.show',compact($subjectyear->id,'id')));
          }

}
