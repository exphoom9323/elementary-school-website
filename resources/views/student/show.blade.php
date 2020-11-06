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
                                <strong class="card-title">{{$user->titlename.$user->firstname}}&nbsp;&nbsp;&nbsp;{{$user->lastname}}</strong>
                            </div>
                            <div class="card-body">
                                <div class="custom-tab">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">น้ำหนักและส่วนสูง</a>

                                            @foreach($studentyears as $studentyear)
                                              @if($subjectyear->find($studentyear->subject_year_id)->setting == "finish")
                                                <a class="nav-item nav-link " id="{{ 'a'.$studentyear->id }}-tab" data-toggle="tab" href="#{{ 'a'.$studentyear->id }}" role="tab" aria-controls="{{ 'a'.$studentyear->id }}" >

                                                  {{$subjectyear->find($studentyear->subject_year_id)->years}}
                                                  <?php if(substr($studentyear->studentyear,0,1) == 'k' ){
                                                    echo "( อนุบาล ".substr($studentyear->studentyear." )", 1);
                                                  }else if(substr($studentyear->studentyear,0,1) == 'p' ){
                                                      echo "( ประถม ".substr($studentyear->studentyear." )", 1);
                                                  }?>
                                                </a>
                                              @endif
                                            @endforeach

                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <?php
                                          $rows = array();
                                          $tableWeight = array();
                                          $tableHeight = array();
                                        ?>
                                        @foreach($whyears as $whyear)

                                                <?php array_push($rows,$whyear->date); ?>

                                                        @foreach($whs as $wh)
                                                        @if($wh->wh_year_id == $whyear->id)

                                                            <?php array_push($tableWeight,$wh->weight); ?>
                                                            <?php array_push($tableHeight,$wh->height); ?>
                                                        @endif
                                                        @endforeach


                                        @endforeach

                                        <div class="col-lg-6">
                                          <!-- <strong class="card-title">น้ำหนัก และ ส่วนสูง</strong> -->
                                            <canvas id="barChart"></canvas>
                                        </div>


                                        </div>



                                        @foreach($studentyears as $studentyear)
                                        @if($subjectyear->find($studentyear->subject_year_id)->setting == "finish")

                          <!-- -->             <div class="tab-pane fade" id="{{ 'a'.$studentyear->id }}" role="tabpanel" aria-labelledby="{{ 'a'.$studentyear->id }}-tab">



                                            @if($studentyear->count()>0)


                                            <table  class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อวิชา</th>
                                                        <th>


                                                              เกรดเฉลี่ย  {{number_format($studentyear->GPA,2)}}


                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($studentscores as $studentscore)
                                                  @if($studentscore->student_years_id == $studentyear->id  )
                                                  <tr>
                                                          <td>{{$subject->find($studentscore->subject_id)->name}} </td>
                                                          <td>
                                                            @if($studentscore->score == '-1')
                                                            0
                                                            @else
                                                            {{$studentscore->score}}
                                                            @endif


                                                            <!-- <select class="form-control" data-placeholder="ยังไม่มีคะแนน" name="{{$subject->find($studentscore->subject_id)->id}}"
                                                                                                                                <?php if($subjectyear->find($studentyear->subject_year_id)->setting != "finish" && auth()->user()->isA()){
                                                                                                                                }else{
                                                                                                                                  echo " disabled";
                                                                                                                                }
                                                                                                                                 ?>  >
                                                                @if(empty($studentscore->score))
                                                                  <option value="">ยังไม่มีคะแนน</option>
                                                                @endif

                                                                    <option value="0"
                                                                      @if($studentscore->score == "0")
                                                                        @if($studentscore->score == "0")
                                                                        selected
                                                                    @endif
                                                                @endif
                                                                >0</option>

                                                                <option value="1"
                                                                  @if($studentscore->score == "1")
                                                                    @if($studentscore->score == "1")
                                                                    selected
                                                                @endif
                                                            @endif
                                                            >1</option>

                                                            <option value="1.5"
                                                              @if($studentscore->score == "1.5")
                                                                @if($studentscore->score == "1.5")
                                                                selected
                                                            @endif
                                                            @endif
                                                            >1.5</option>

                                                            <option value="2"
                                                              @if($studentscore->score == "2")
                                                                @if($studentscore->score == "2")
                                                                selected
                                                            @endif
                                                            @endif
                                                            >2</option>

                                                            <option value="2.5"
                                                              @if($studentscore->score == "2.5")
                                                                @if($studentscore->score == "2.5")
                                                                selected
                                                            @endif
                                                            @endif
                                                            >2.5</option>

                                                            <option value="3"
                                                              @if($studentscore->score == "3")
                                                                @if($studentscore->score == "3")
                                                                selected
                                                            @endif
                                                            @endif
                                                            >3</option>

                                                            <option value="3.5"
                                                              @if($studentscore->score == "3.5")
                                                                @if($studentscore->score == "3.5")
                                                                selected
                                                            @endif
                                                            @endif
                                                            >3.5</option>

                                                            <option value="4"
                                                              @if($studentscore->score == "4")
                                                                @if($studentscore->score == "4")
                                                                selected
                                                            @endif
                                                            @endif
                                                            >4</option>




                                                            </select> -->



                                                          </td>

                                                        </tr>
                                                        @endif
                                                    @endforeach

                                                    @foreach($studentcriterias as $studentcriteria)
                                                    @if($studentcriteria->student_years_id == $studentyear->id  )
                                                    <tr>
                                                            <td>{{$subject->find($studentcriteria->subject_id)->name}}</td>
                                                            <td>
                                                              {{$studentcriteria->criteria}}
                                                                  <!-- <select class="form-control" data-placeholder="ยังไม่มีคะแนน" name="{{$subject->find($studentcriteria->subject_id)->id}}"
                                                                                                        <?php if($subjectyear->find($studentyear->subject_year_id)->setting != "finish" && auth()->user()->isA()){
                                                                                                        }else{
                                                                                                          echo " disabled";
                                                                                                        }
                                                                                                         ?>  >
                                                                      @if(empty($studentcriteria->criteria))
                                                                        <option value="">ยังไม่มผลประเมิน</option>
                                                                      @endif

                                                                          <option value="ผ่าน"
                                                                            @if(isset($studentcriteria->criteria))
                                                                              @if($studentcriteria->criteria == "ผ่าน")
                                                                              selected
                                                                          @endif
                                                                      @endif
                                                                      >ผ่าน</option>

                                                                      <option value="ไม่ผ่าน"
                                                                        @if(isset($studentcriteria->criteria))
                                                                          @if($studentcriteria->criteria == "ไม่ผ่าน")
                                                                          selected
                                                                      @endif
                                                                  @endif
                                                                  >ไม่ผ่าน</option>

                                                                  </select> -->


                                                            </td>

                                                          </tr>
                                                          @endif
                                                      @endforeach
                                                        </tbody>
                                                </table>



                                                @else
                                                <h3 class="text text-content">ยังไม่มีข้อมูล</h3>
                                              @endif





                          <!-- -->              </div>
                                        @endif
                                        @endforeach


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

        <script src="{{asset('src/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>


        <script type="text/javascript">
        //bar chart
        var ctx = document.getElementById( "barChart" );
        ctx.height = 200;
        var myChart = new Chart( ctx, {
            type: 'bar',
            data: {
                labels: <?=json_encode($rows)?>,
                datasets: [
                    {
                        label: "น้ำหนัก",
                        data: <?=json_encode($tableWeight, JSON_NUMERIC_CHECK);?>,
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0, 123, 255, 0.5)"
                                },
                    {
                        label: "ส่วนสูง",
                        data: <?=json_encode($tableHeight , JSON_NUMERIC_CHECK);?>,
                        borderColor: "rgba(50, 115, 220, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(50, 115, 220, 0.5)"
                                }
                            ]
            },
            options: {
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                                    } ]
                }
            }
        } );
        </script>
        @endsection

        @section('css')

         <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

        @endsection
