@extends('layouts.src')
@section('content')


        <div class="content mt-3">
                <div class="animated fadeIn">

                  @if(Session()->has('success'))          <!-- Session มีค่า success  -->
                                  <div class="alert alert-success">
                                        {{Session()->get('success')}} <!-- แสดงค่า success ของ Session  -->
                                  </div>
                              @endif
                              @if(Session()->has('error'))
                                  <div class="alert alert-danger">
                                        {{Session()->get('error')}}
                                  </div>
                              @endif



                        <div class="row">
                            <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">ปีการศึกษา {{$SubjectYearName->years}}</strong>
                            </div>
                            <div class="card-body">
                                <div class="custom-tab">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">หน้าหลัก</a>

                                            @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
                                                <a class="nav-item nav-link " id="{{ $pAll }}-tab" data-toggle="tab" href="#{{ $pAll }}" role="tab" aria-controls="{{ $pAll }}" >ประถม  {{ $i }}</a>
                                            @endfor

                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">



                                          <div class="form-group row">



                                          @if($teacher->setting == 'create')
                                          <div class="col-md-1">
                                            <form class="edit_form" action="{{route('subject.open', $id )}}" method="GET">
                                                @csrf
                                                <input type="hidden" name="_method" value="EDIT">
                                                <input type="submit" name="" value="เริ่มปีการศึกษา" class="btn btn-info btn-sm">
                                            </form>
                                          </div>
                                          @endif
                                          @if($teacher->setting == 'on' || $teacher->setting == 'checkon')
                                          <div class="col-md-1">
                                            <form class="edit_form" action="{{route('subject.finish', $id )}}" method="GET">
                                                @csrf
                                                <input type="hidden" name="_method" value="EDIT">
                                                <input type="submit" name="" value="จบปีการศึกษา" class="btn btn-info btn-sm">
                                            </form>
                                          </div>
                                          @endif

                                          @if(empty($onet))
                                          <div class="col-md-1">
                                            <form class="edit_form" action="{{route('subject.createOnet', $id )}}" method="GET">
                                                @csrf
                                                <input type="hidden" name="_method" value="EDIT">
                                                <input type="submit" name="" value="เพิ่มคะแนน O-net" class="btn btn-info btn-sm">
                                            </form>
                                          </div>
                                          @endif

                                            </div>



                                                <div class="card-header">
                                                    <strong class="card-title">ครูประจำชั้น</strong>
                                                </div>

                                                <form action="{{route('subject.homeroom',$id )}}" method="post" >
                                                    @csrf
                                                  @method('PUT')
                                            <table  class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-2 mb-3">ระดับชั้น</th>
                                                        <th>รายชื่อครู</th>
                                                    </tr>
                                                </thead>

                                                      <tbody>


                                                        <tr>
                                                                <td>อนุบาล 1</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="k1[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassK1))
                                                                                @foreach($TclassK1 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>อนุบาล 2</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="k2[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassK2))
                                                                                @foreach($TclassK2 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>อนุบาล 3</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="k3[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassK3))
                                                                                @foreach($TclassK3 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif

                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>ประถม 1</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="p1[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassP1))
                                                                                @foreach($TclassP1 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif

                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>ประถม 2</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="p2[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassP2))
                                                                                @foreach($TclassP2 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif

                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>ประถม 3</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="p3[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassP3))
                                                                                @foreach($TclassP3 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif

                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>ประถม 4</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="p4[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassP4))
                                                                                @foreach($TclassP4 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif

                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>ประถม 5</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="p5[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassP5))
                                                                                @foreach($TclassP5 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif

                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td>ประถม 6</td>
                                                                <td>

                                                                      <select class="form-control standardSelect" name="p6[]" multiple>
                                                                          @foreach($usersTeachers as $usersTeacher)
                                                                              <option value="{{$usersTeacher->id}}"
                                                                                @if(isset($TclassP6))
                                                                                @foreach($TclassP6 as $Tclass)
                                                                                  @if($usersTeacher->id == $Tclass->user_id)
                                                                                                selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif

                                                                      >{{$usersTeacher->titlename.$usersTeacher->firstname}}&nbsp;&nbsp;&nbsp;{{$usersTeacher->lastname}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                                                                          @endforeach
                                                                      </select>

                                                                </td>
                                                        </tr>

                                                        </tbody>


                                                </table>
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> ยืนยัน
                                                </button>
                                              </form>



                                                @if(isset($onet))
                                                    <div class="card-header">
                                                        <strong class="card-title">O-net</strong>
                                                    </div>

                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>วิชา</th>
                                                        <th>คะแนน </th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                               <!-- $Categort คือ sql จาก web.php  -->
                                                              <tr>
                                                                  <td>ภาษาไทย ของโรงเรียน</td>
                                                                  <td>{{$onet->thai}}</td>
                                                              </tr>
                                                              <tr>
                                                                <td>ภาษาอังกฤษ ของโรงเรียน</td>
                                                                <td>{{$onet->eng}}</td>
                                                              </tr>
                                                              <tr>
                                                                <td>คณิตศาสตร์ ของโรงเรียน</td>
                                                                <td>{{$onet->mathematics}}</td>
                                                              </tr>
                                                              <tr>
                                                                <td>วิทยาศาสตร์ ของโรงเรียน</td>
                                                                <td>{{$onet->science}}</td>
                                                              </tr>
                                                              <tr>
                                                                  <td>ภาษาไทย ของประเทศ</td>
                                                                  <td>{{$onet->allthai}}</td>
                                                              </tr>
                                                              <tr>
                                                                <td>ภาษาอังกฤษ ของประเทศ</td>
                                                                <td>{{$onet->alleng}}</td>
                                                              </tr>
                                                              <tr>
                                                                <td>คณิตศาสตร์ ของประเทศ</td>
                                                                <td>{{$onet->allmathematics}}</td>
                                                              </tr>
                                                              <tr>
                                                                <td>วิทยาศาสตร์ ของประเทศ</td>
                                                                <td>{{$onet->allscience}}</td>
                                                              </tr>

                                                            </tbody>
                                                    </table>
                                                    <div class="form-group">
                                                      <form class="edit_form" action="{{route('subject.editOnet', ['id' => $id,'onet'=> $onet->id] )}}" method="GET">
                                                          @csrf
                                                          <input type="hidden" name="_method" value="EDIT">
                                                          <input type="submit" name="" value="แก้ไขคะแนน O-net" class="btn btn-info btn-sm">
                                                      </form>
                                                    </div>

                                                  @endif




                                        </div>


                                        @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
                          <!-- -->             <div class="tab-pane fade" id="{{ $pAll }}" role="tabpanel" aria-labelledby="{{ $pAll }}-tab">

                                        @if($teacher->setting == 'create')
                                                <div class="d-flex justify-content-end mb-2">
                                                     <a href="{{route('subject.create', ['id' => $id,'studentyear'=> $pAll])}}" class="btn btn-success ">เพิ่มวิชา</a>

                                                                      <form action="{{route('subject.update',['id' => $id,'studentyear'=> $pAll])}}" method="post" >
                                                                        @csrf
                                                                              @method('PUT')
                                                                       <button type="submit" class="btn btn-primary">
                                                                            บันทึก
                                                                       </button>


                                                </div>
                                            @endif


                                                @if($subjectyears->count()>0 && $subjectyears->where('studentyear',$pAll)->pluck('studentyear')->count()!=0)
                                                <table  class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ชื่อวิชา</th>
                                                            <th>หน่วยกิต</th>
                                                    @if($teacher->setting != 'finish')
                                                            <th></th>
                                                    @endif

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach($subjectyears as $subject)
                                                      @if($subject->studentyear == $pAll)
                                                      <tr>
                                                        <td>
                                                          <div class="form-group">
                                                            @if($teacher->setting == 'create')
                                                              <input type="text" name="{{'name'.$subject->id}}" value="{{$subject->name}}" class="form-control" >
                                                            @else
                                                              {{$subject->name}}
                                                            @endif
                                                          </div>
                                                        </td>
                                                        <td class="col-md-2">
                                                          @if($subject->type == 'score')
                                                            @if($teacher->setting == 'create')
                                                              <input type="text" class="form-control" name="{{'credit'.$subject->id}}"  value="{{$subject->credit}}">
                                                            @else
                                                              {{$subject->credit}}
                                                            @endif
                                                          @endif
                                                          <!-- <form class="edit_form" action="{{route('subject.edit',['id' => $id,'subject'=> $subject->id] )}}" method="GET">
                                                              @csrf
                                                              <input type="hidden" name="_method" value="EDIT">
                                                              <input type="submit" name="" value="Edit" class="btn btn-info btn-sm">
                                                          </form> -->
                                                      </td>
                                                          @if($teacher->setting == 'create')
                                                              <td class="col-md-1">
                                                                  @if($subject->type == 'score')
                                                                  <!-- <form class="delete_form" action="{{route('subject.destroy', ['id' => $id,'subject'=> $subject->id] )}}" method="post">
                                                                      @csrf
                                                                      <input type="hidden" name="_method" value="DELETE">
                                                                      <input type="submit" name="" value="ลบวิชา" class="btn btn-danger btn-sm">
                                                                  </form> -->
                                                                  <button type="submit" formaction="{{route('subject.destroy', ['id' => $id,'subject'=> $subject->id] )}}"class="btn btn-danger btn-sm" name="_method" value="DELETE">
                                                                    @csrf

                                                                      <i class="fa fa-dot-circle-o"></i> ลบวิชา
                                                                  </button>
                                                                  @endif
                                                              </td>
                                                          @elseif($teacher->setting == 'on' || $teacher->setting == 'checkon')
                                                          <td class="col-md-1">
                                                              <form class="edit_form" action="{{route('subject.grade',['id' => $id,'subject'=> $subject->id] )}}" method="GET">
                                                                  @csrf
                                                                  <input type="hidden" name="_method" value="EDIT">
                                                                  <input type="submit" name="" value="
                                                                    @if($subject->type == 'score')
                                                                      กรอกเกรด
                                                                    @else
                                                                      กรอกผลการประเมิณ
                                                                    @endif
                                                                  " class="btn btn-success">
                                                              </form>
                                                          </td>
                                                          @endif
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                            </tbody>
                                                    </table>
                                                    </form>
                                                    @else
                                                    <h3 class="text text-content">ยังไม่มีข้อมูล</h3>
                                                  @endif

                          <!-- -->              </div>
                                        @endfor

                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                  </div>
              </div>
          </div>



    @endsection


        @section('js')
        <script src="{{asset('src/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('src/vendors/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{asset('src/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('src/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('src/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" charset="utf-8"></script>


        @endsection

        @section('css')

        <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

        @endsection
