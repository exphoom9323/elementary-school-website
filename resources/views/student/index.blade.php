@extends('layouts.src')
@section('content')

@if(auth()->user()->isA())
<div class="col-sm-12">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">
                          <div class="d-flex justify-content-end mb-2">
                            <a href="{{route('student.create')}}" class="btn btn-success ">เพิ่มนักเรียน</a>
                        </div>
                      </li>
                    </ol>
                </div>
            </div>
        </div>
  @endif

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
                                <strong class="card-title">ตารางข้อมูลนักเรียน</strong>
                            </div>
                            <div class="card-body">
                                <div class="custom-tab">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">รายชื่อนักเรียนทั้งหมด</a>

                                            @for ($i = 1; $i <= 3; $i++) <?php $kAll = 'k'.$i ?>
                                                <a class="nav-item nav-link " id="{{ $kAll }}-tab" data-toggle="tab" href="#{{ $kAll }}" role="tab" aria-controls="{{ $kAll }}" >อนุบาล {{ $i }}</a>
                                            @endfor
                                            @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
                                                <a class="nav-item nav-link " id="{{ $pAll }}-tab" data-toggle="tab" href="#{{ $pAll }}" role="tab" aria-controls="{{ $pAll }}" >ประถม  {{ $i }}</a>
                                            @endfor

                                            <!-- @if(isset($usercheckon) && auth()->user()->isA())
                                                <a class="nav-item nav-link " id="Unsuccessful-tab" data-toggle="tab" href="#Unsuccessful" role="tab" aria-controls="Unsuccessful" >รายชื่อนักเรียนที่ยังไม่ได้กรอกเกรด</a>
                                            @endif -->

                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">

                                          @if($users->count()>0 )
                                          <table id="bootstrap-data-table-export"   class="table table-striped table-bordered">
                                              <thead>
                                                  <tr>
                                                    <th>รหัสนักเรียน</th>
                                                    <th>เลขบัตรประจำตัวประชาชน</th>
                                                    <th>ชื่อ-นามสกุล</th>
                                                    <th>ระดับชั้น</th>
                                                    <th></th>
                                                @if(auth()->user()->isA())
                                                    <!-- <th></th> -->
                                                @endif
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($users as $user)
                                                <tr>
                                                        <td>{{$user->studentcode}}</td>
                                                        <td>{{$user->idcard}}</td>
                                                        <td>
                                                          <a href="{{route('student.show', $user->id )}}" method="GET">
                                                            {{$user->titlename.$user->firstname}}&nbsp;&nbsp;&nbsp;{{$user->lastname}}
                                                          </a>
                                                      </td>
                                                        <td>
                                                          <?php if(substr($user->studentyear,0,1) == 'k' ){
                                                            echo "อนุบาล ".substr($user->studentyear, 1);
                                                          }else if(substr($user->studentyear,0,1) == 'p' ){
                                                              echo "ประถม ".substr($user->studentyear, 1);
                                                          }else {
                                                              echo $user->studentyear;
                                                          }?>
                                                        </td>
                                                        <td>
                                                          <form class="edit_form" action="{{route('student.edit', $user->id )}}" method="GET">
                                                              @csrf
                                                              <input type="hidden" name="_method" value="EDIT">
                                                              <input type="submit" name="" value="
                                                              @if(auth()->user()->isA())
                                                              แก้ไขข้อมูลทั่วไป
                                                              @else
                                                              ข้อมูลทั่วไป
                                                              @endif
                                                              " class="btn btn-info btn-sm">
                                                          </form>
                                                      </td>
                                                <!-- @if(auth()->user()->isA())
                                                        <td>
                                                            <form class="delete_form" action="{{route('student.destroy',$user->id )}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="submit" name="" value="ลบ" class="btn btn-danger btn-sm">
                                                            </form>
                                                        </td>
                                                @endif -->
                                                      </tr>
                                                  @endforeach
                                                      </tbody>
                                              </table>
                                              @else
                                              <h3 class="text text-content">ยังไม่มีข้อมูล</h3>
                                            @endif

                                        </div>

                                        @for ($i = 1; $i <= 3; $i++) <?php $kAll = 'k'.$i?>
                                <!-- -->      <div class="tab-pane fade" id="{{ $kAll }}" role="tabpanel" aria-labelledby="{{ $kAll }}-tab">



                                            @if($users->count()>0 && $users->where('studentyear',$kAll)->pluck('studentyear')->count()!=0)


                                            @foreach($users as $user)
                                            @if($user->studentyear == $kAll)
                                                    <section class="card">
                                                        <div class="twt-feed blue-bg">
                                                          <a href="{{route('student.edit', $user->id )}}" method="GET">
                                                            <div class="corner-ribon black-ribon">
                                                                <p class="text-light" style="font-size: 13px;" align = 'right'>ข้อมูล<br>ทั่วไป

                                                                </p>
                                                            </div>
                                                          </a>


                                                            <div class="media">
                                                                <a href="#">
                                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{asset('img/no-image.png')}}">
                                                                </a>
                                                                <div class="media-body">
                                                                    <a href="{{route('student.show', $user->id )}}" method="GET">
                                                                      <h2 class="text-white display-6">{{$user->titlename.$user->firstname}}&nbsp;&nbsp;&nbsp;{{$user->lastname}}</h2>
                                                                    </a>
                                                                    <p class="text-light">รหัสนักเรียน {{$user->studentcode}}<br>เลขบัตรประจำตัวประชาชน {{$user->idcard}}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </section>
                                                    @endif
                                                @endforeach


                                            @else
                                              <h3 class="text text-content">ยังไม่มีข้อมูล</h3>
                                            @endif

                          <!-- -->       </div>
                                        @endfor


                                        @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
                          <!-- -->             <div class="tab-pane fade" id="{{ $pAll }}" role="tabpanel" aria-labelledby="{{ $pAll }}-tab">

                                                @if($users->count()>0 && $users->where('studentyear',$pAll)->pluck('studentyear')->count()!=0)



                                                @foreach($users as $user)
                                                @if($user->studentyear == $pAll)
                                                        <section class="card">
                                                            <div class="twt-feed blue-bg">
                                                              <a href="{{route('student.edit', $user->id )}}" method="GET">
                                                                <div class="corner-ribon black-ribon">
                                                                    <p class="text-light" style="font-size: 13px;" align = 'right'>ข้อมูล<br>ทั่วไป</p>
                                                                </div>
                                                              </a>


                                                                <div class="media">
                                                                    <a href="#">
                                                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{asset('img/no-image.png')}}">
                                                                    </a>
                                                                    <div class="media-body">
                                                                      <a href="{{route('student.show', $user->id )}}" method="GET">
                                                                        <h2 class="text-white display-6">{{$user->titlename.$user->firstname}}&nbsp;&nbsp;&nbsp;{{$user->lastname}}</h2>
                                                                      </a>
                                                                        <p class="text-light">รหัสนักเรียน {{$user->studentcode}}<br>เลขบัตรประจำตัวประชาชน {{$user->idcard}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </section>
                                                        @endif
                                                    @endforeach


                                                @else
                                                  <h3 class="text text-content">ยังไม่มีข้อมูล</h3>
                                                @endif

                          <!-- -->              </div>
                                        @endfor

                                          <!-- @if(isset($usercheckon) && auth()->user()->isA())

                                        <div class="tab-pane fade" id="Unsuccessful" role="tabpanel" aria-labelledby="Unsuccessful-tab">



                                          <table   class="table table-striped table-bordered">
                                              <thead>
                                                  <tr>
                                                    <th>รหัสนักเรียน</th>
                                                    <th>เลขบัตรประจำตัวประชาชน</th>
                                                    <th>ชื่อ-นามสกุล</th>
                                                    <th>ระดับชั้น</th>

                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($usercheckon as $user)
                                                <tr>
                                                        <td>{{$user->studentcode}}</td>
                                                        <td>{{$user->idcard}}</td>
                                                        <td>
                                                          <a href="{{route('student.show', $user->id )}}" method="GET">
                                                            {{$user->titlename.$user->firstname}}&nbsp;&nbsp;&nbsp;{{$user->lastname}}
                                                          </a>
                                                      </td>
                                                        <td>
                                                          <?php if(substr($user->studentyear,0,1) == 'k' ){
                                                            echo "อนุบาล ".substr($user->studentyear, 1);
                                                          }else if(substr($user->studentyear,0,1) == 'p' ){
                                                              echo "ประถม ".substr($user->studentyear, 1);
                                                          }else {
                                                              echo $user->studentyear;
                                                          }?>
                                                        </td>
                                                      </tr>
                                                  @endforeach
                                                      </tbody>
                                              </table>


                                        </div>
                                        @endif -->





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


        @endsection

        @section('css')

         <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

        @endsection
