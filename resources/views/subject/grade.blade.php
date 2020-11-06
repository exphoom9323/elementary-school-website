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
                                <strong class="card-title">{{$subject->name}} <?php
                                                                                      if(substr($subject->studentyear,0,1) == 'p' ){
                                                                                          echo "( ประถม:".substr($subject->studentyear, 1);
                                                                                      }
                                                                                  ?>
                                                                                  ปีการศึกษา:{{$SubjectYear->find($subject->subject_year_id)->years}} )
                              </strong>
                            </div>
                            <div class="card-body">
                                @if($types->count()>0)
                              <form action="{{route('subject.updategrade',['thetype' => $thetype,'subject'=> $subject->id , 'id'=>$subject->subject_year_id] )}}" method="post">
                                @csrf

                                      @method('PUT')


                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>รหัสนักเรียน</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($types as $type)
                                        <tr>
                                          <td  class="col-md-1">
                                            {{$users->find($type->user_id)->studentcode}}
                                          </td>
                                          <td>
                                            {{$users->find($type->user_id)->titlename.$users->find($type->user_id)->firstname}}&nbsp;&nbsp;&nbsp;{{$users->find($type->user_id)->lastname}}
                                          </td>
                                          <td >
                                          @if($thetype == 'score')
                                            <select class="form-control" data-placeholder="ยังไม่มีคะแนน" name="{{$type->id}}">
                                                @if(empty($type->score))
                                                  <option value="">ยังไม่มีคะแนน</option>
                                                @endif

                                                    <option value="-1"
                                                      @if($type->score == "-1")
                                                        @if($type->score == "-1")
                                                        selected
                                                    @endif
                                                @endif
                                                >0</option>

                                                <option value="1"
                                                  @if($type->score == "1")
                                                    @if($type->score == "1")
                                                    selected
                                                @endif
                                            @endif
                                            >1</option>

                                            <option value="1.5"
                                              @if($type->score == "1.5")
                                                @if($type->score == "1.5")
                                                selected
                                            @endif
                                            @endif
                                            >1.5</option>

                                            <option value="2"
                                              @if($type->score == "2")
                                                @if($type->score == "2")
                                                selected
                                            @endif
                                            @endif
                                            >2</option>

                                            <option value="2.5"
                                              @if($type->score == "2.5")
                                                @if($type->score == "2.5")
                                                selected
                                            @endif
                                            @endif
                                            >2.5</option>

                                            <option value="3"
                                              @if($type->score == "3")
                                                @if($type->score == "3")
                                                selected
                                            @endif
                                            @endif
                                            >3</option>

                                            <option value="3.5"
                                              @if($type->score == "3.5")
                                                @if($type->score == "3.5")
                                                selected
                                            @endif
                                            @endif
                                            >3.5</option>

                                            <option value="4"
                                              @if($type->score == "4")
                                                @if($type->score == "4")
                                                selected
                                            @endif
                                            @endif
                                            >4</option>
                                            </select>
                                            @else
                                            <select class="form-control" data-placeholder="ยังไม่มีคะแนน" name="{{$type->id}}"  >
                                                @if(empty($type->criteria))
                                                  <option value="">ยังไม่มผลประเมิน</option>
                                                @endif

                                                    <option value="ผ่าน"
                                                      @if(isset($type->criteria))
                                                        @if($type->criteria == "ผ่าน")
                                                        selected
                                                    @endif
                                                @endif
                                                >ผ่าน</option>

                                                <option value="ไม่ผ่าน"
                                                  @if(isset($type->criteria))
                                                    @if($type->criteria == "ไม่ผ่าน")
                                                    selected
                                                @endif
                                            @endif
                                            >ไม่ผ่าน</option>

                                            </select>

                                            @endif

                                          </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> ยืนยัน
                                    </button>


                                      </form>

                                      @else
                                      <h3 class="text text-content">ยังไม่มีข้อมูล</h3>
                                    @endif

                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


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


    @endsection

    @section('css')
    <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">


    @endsection
