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
                                <strong class="card-title">{{$whyearDate}}</strong>
                            </div>
                            <div class="card-body">
                                <div class="custom-tab">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">


                                            @for ($i = 1; $i <= 3; $i++) <?php $kAll = 'k'.$i ?>
                                                <a class="nav-item nav-link " id="{{ $kAll }}-tab" data-toggle="tab" href="#{{ $kAll }}" role="tab" aria-controls="{{ $kAll }}" >อนุบาล {{ $i }}</a>
                                            @endfor
                                            @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
                                                <a class="nav-item nav-link " id="{{ $pAll }}-tab" data-toggle="tab" href="#{{ $pAll }}" role="tab" aria-controls="{{ $pAll }}" >ประถม  {{ $i }}</a>
                                            @endfor

                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">


                                        @for ($i = 1; $i <= 3; $i++) <?php $kAll = 'k'.$i?>
                                <!-- -->      <div class="tab-pane fade" id="{{ $kAll }}" role="tabpanel" aria-labelledby="{{ $kAll }}-tab">



                                            @if($users->count()>0 && $users->where('studentyear',$kAll)->pluck('studentyear')->count()!=0)

                                            <form action="{{route('wh.score',['class' => $kAll,'whyear'=> $whyear] )}}" method="post" enctype="multipart/form-data">
                                              @csrf
                                                    @method('PUT')
                                            <table    class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                      <th>รหัสนักเรียน</th>
                                                      <th>เลขบัตรประจำตัวประชาชน</th>
                                                      <th>ชื่อ-นามสกุล</th>
                                                      <th>น้ำหนัก</th>
                                                      <th>ส่วนสูง</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($users as $user)
                                                    @if($user->studentyear == $kAll )

                                                        <tr>
                                                          <td>{{$user->studentcode}}</td>
                                                          <td>{{$user->idcard}}</td>
                                                          <td>{{$user->titlename.$user->firstname}}&nbsp;&nbsp;&nbsp;{{$user->lastname}}</td>

                                                          @foreach($whs as $wh)
                                                            @if($wh->wh_year_id == $whyear && $wh->user_id == $user->id)
                                                          <td>
                                                            <div class="form-group">
                                                                <input type="text" name="{{'weight'.$user->id}}" value="{{isset($wh)?$wh->weight:''}}" class="form-control" placeholder="ยังไม่มีตัวเลขน้ำหนัก" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"
                                                                                @if(auth()->user()->isA())
                                                                                @else
                                                                                  @foreach($Tclasses as $Tclass)
                                                                                  {{$Tclass->user_id}}
                                                                                      @if(Auth::user()->id == $Tclass->user_id && $Tclass->studentyear == $kAll)
                                                                                      @else
                                                                                          disabled
                                                                                      @endif
                                                                                  @endforeach
                                                                                @endif
                                                                                >
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="form-group">
                                                                <input type="text" name="{{'height'.$user->id}}" value="{{isset($wh)?$wh->height:''}}" class="form-control" placeholder="ยังไม่มีตัวเลขส่วนสูง" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"
                                                                                              @if(auth()->user()->isA())
                                                                                              @else
                                                                                                @foreach($Tclasses as $Tclass)
                                                                                                    @if(Auth::user()->id == $Tclass->user_id && $Tclass->studentyear == $kAll)
                                                                                                    @else
                                                                                                        disabled
                                                                                                    @endif
                                                                                                @endforeach
                                                                                              @endif
                                                                                              >
                                                            </div>
                                                          </td>

                                                        </tr>
                                                        @endif
                                                      @endforeach
                                                    @endif
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



                          <!-- -->       </div>
                                        @endfor


                                        @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
                          <!-- -->             <div class="tab-pane fade" id="{{ $pAll }}" role="tabpanel" aria-labelledby="{{ $pAll }}-tab">

                                                @if($users->count()>0 && $users->where('studentyear',$pAll)->pluck('studentyear')->count()!=0)

                                                <form action="{{route('wh.score',['class' => $pAll,'whyear'=> $whyear] )}}" method="post" enctype="multipart/form-data">
                                                  @csrf
                                                        @method('PUT')
                                                        <table class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                  <th>รหัสนักเรียน</th>
                                                                  <th>เลขบัตรประจำตัวประชาชน</th>
                                                                  <th>ชื่อ-นามสกุล</th>
                                                                  <th>น้ำหนัก</th>
                                                                  <th>ส่วนสูง</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              @foreach($users as $user)
                                                              @if($user->studentyear == $pAll)
                                                              <tr>
                                                                      <td>{{$user->studentcode}}</td>
                                                                      <td>{{$user->idcard}}</td>
                                                                      <td>{{$user->titlename.$user->firstname}}&nbsp;&nbsp;&nbsp;{{$user->lastname}}</td>

                                                                      @foreach($whs as $wh)
                                                                      @if($wh->wh_year_id == $whyear && $wh->user_id == $user->id)
                                                                      <td>
                                                                        <div class="form-group">
                                                                            <input type="text" name="{{'weight'.$user->id}}" value="{{isset($wh)?$wh->weight:''}}" class="form-control" placeholder="ยังไม่มีตัวเลขน้ำหนัก" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"
                                                                                              @if(auth()->user()->isA())
                                                                                              @else
                                                                                                @foreach($Tclasses as $Tclass)
                                                                                                    @if(Auth::user()->id == $Tclass->user_id && $Tclass->studentyear == $pAll)
                                                                                                      @else
                                                                                                        disabled
                                                                                                    @endif
                                                                                                @endforeach
                                                                                              @endif
                                                                                            >
                                                                        </div>
                                                                      </td>
                                                                      <td>
                                                                        <div class="form-group">
                                                                            <input type="text" name="{{'height'.$user->id}}" value="{{isset($wh)?$wh->height:''}}" class="form-control" placeholder="ยังไม่มีตัวเลขส่วนสูง" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"
                                                                                                        @if(auth()->user()->isA())
                                                                                                        @else
                                                                                                          @foreach($Tclasses as $Tclass)
                                                                                                              @if(Auth::user()->id == $Tclass->user_id && $Tclass->studentyear == $pAll)
                                                                                                                @else
                                                                                                                  disabled
                                                                                                              @endif
                                                                                                          @endforeach
                                                                                                        @endif

                                                                                                        >
                                                                        </div>
                                                                      </td>
                                                                      @endif
                                                                      @endforeach
                                                              </tr>
                                                                    @endif
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


        @endsection

        @section('css')

         <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

        @endsection
