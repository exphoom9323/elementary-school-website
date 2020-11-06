<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectYear;
use App\Subject;

use App\Http\Requests\CreateSubjectYearRequest;
use App\Http\Requests\UpdateSubjectYearRequest;

Use App\Tclass;

class SubjectYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SubjectYear = SubjectYear::orderBy('years')->get();
        return view('subjectyear.index')->with('subjectyears',$SubjectYear);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjectyear.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubjectYearRequest $request)
    {

      if(SubjectYear::all()->whereIn('setting',[null,'on','checkon','create'])->count()!=0){
            Session()->flash('error','ไม่สามารถเพิ่มได้ เนื่องจากมีปีการศึกษาอื่นเปิดอยู่');
            return redirect(route('subjectyear.index'));
      }

      $subjectyear = SubjectYear::create([
        'years'=>$request->years,
        'p1'=>$request->p1,'p2'=>$request->p2,'p3'=>$request->p3,'p4'=>$request->p4,'p5'=>$request->p5,'p6'=>$request->p6,
        'setting'=>'create'
      ])->id;


      for($i = 1; $i <= 3; $i++){
        $kAll = 'k'.$i;
        Tclass::create([
          'subject_year_id' => $subjectyear,
          'studentyear' => $kAll
        ]);
      }
      for($i = 1; $i <= 6; $i++){
        $pAll = 'p'.$i;
        Tclass::create([
          'subject_year_id' => $subjectyear,
          'studentyear' => $pAll
        ]);
      }


      for($i = 1; $i <= 6; $i++){
        for($x = 1; $x <= 10; $x++){
          if($x == 1){$val='ภาษาไทย';}else if($x == 2) {$val='ภาษาอังกฤษ';}else if($x == 3){$val='วิทยาศาสตร์';}else if($x == 4){$val='สังคมศึกษา ศาสนาฯ';}else if($x == 5){$val='ประวัติศาสตร์';}
          else if($x == 6){$val='สุขศึกษาและพลศึกษา';}else if($x == 7){$val='ศิลปะ';}else if($x == 8){$val='การงานอาชีพและเทคโนโลยี';}else if($x == 9){$val='ภาษาอังกฤษ';}else{$val='ภาษาอังกฤษเพิ่มเติม';}
          Subject::create([
            'name'=> $val,'type'=>'score','subject_year_id'=>$subjectyear,'studentyear'=>'p'.$i
          ]);
        }
        for($x = 1; $x <= 4; $x++){
          if($x == 1){$val='ผลการประเมิณการอ่าน คิด วิเคราะห์ และเขียน';}else if($x == 2) {$val='ผลการประเมิณคุณลักษณะอันพึงประสงค์';}else if($x == 3){$val='ผลการประเมิณกิจกรรมพัฒาผู้เรียน';}else {$val='ผลการประเมิณเวลาเรียน';}
          Subject::create([
            'name'=> $val,'type'=>'criteria','subject_year_id'=>$subjectyear,'studentyear'=>'p'.$i
          ]);
        }
      }


      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('subjectyear.index'));
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
    public function edit(SubjectYear $subjectyear)
    {
        return view('subjectyear.create')->with('subjectyear',$subjectyear);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectYearRequest $request, SubjectYear $subjectyear)
    {

      $subjectyear->update([
        'years'=>$request->years,
        'p1'=>$request->p1,'p2'=>$request->p2,'p3'=>$request->p3,'p4'=>$request->p4,'p5'=>$request->p5,'p6'=>$request->p6
      ]);
      Session()->flash('success','บันทึกข้องมูลเรียบร้อย');
      return redirect(route('subjectyear.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectYear $subjectyear)
    {

      // for($i = 1; $i <= 3; $i++){
      //   $kAll = 'k'.$i;
      //   foreach(permission::all() as $permission){
      //     if($permission->name == $subjectyear->years.$kAll){
      //       $perm = Permission::findByName($subjectyear->years.$kAll);
      //       $perm->delete();
      //     }
      //   }
      // }
      // for($i = 1; $i <= 6; $i++){
      //   $pAll = 'p'.$i;
      //   foreach(permission::all() as $permission){
      //     if($permission->name == $subjectyear->years.$pAll){
      //       $perm = Permission::findByName($subjectyear->years.$pAll);
      //       $perm->delete();
      //     }
      //   }
      // }

      $subjectyear->delete();
      Session()->flash('success','ลบข้อมูลเรียบร้อย');
      return redirect(route('subjectyear.index'));
    }
}
