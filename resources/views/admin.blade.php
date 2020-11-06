@extends('layouts.src')

@section('content')

<div class="content mt-3">
        <div class="animated fadeIn">
  <div class="row">
<!--      o-net         -->
    <div class="col-md-12">
<div class="card">
  <div class="card-header">
      <strong class="card-title">คะแนน O-net</strong>
  </div>
  <div class="card-body">


      <div class="col-lg-6">
      <div class="card">
          <div class="card-body">
              <h4 class="mb-3">ภาษาไทย</h4>
              <canvas id="ONet1"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
      <div class="card">
          <div class="card-body">
              <h4 class="mb-3">อังกฤษ</h4>
              <canvas id="ONet2"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
      <div class="card">
          <div class="card-body">
              <h4 class="mb-3">คณิตศาสตร์</h4>
              <canvas id="ONet3"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
      <div class="card">
          <div class="card-body">
              <h4 class="mb-3">วิทยาศาสตร์</h4>
              <canvas id="ONet4"></canvas>
          </div>
        </div>
      </div>

    </div>
    </div>
    </div>
<!--      o-net         -->

<!--      o-net         -->
    <div class="col-md-12">
<div class="card">
  <div class="card-header">
      <strong class="card-title">จำนวนนักเรียน ( {{$users->count()}} )</strong>
  </div>
  <div class="card-body">


      <div class="col-lg-6">
      <div class="card">
          <div class="card-body">
              <h4 class="mb-3">กราฟแสดงจำนวนนักเรียนชายและหญิง</h4>
              <canvas id="count1"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
      <div class="card">
          <div class="card-body">
              <h4 class="mb-3">กราฟแสดงจำนวนนักเรียนชายและหญิงในแต่ละชั้น</h4>
              <canvas id="count2"></canvas>
          </div>
        </div>
      </div>


    </div>
    </div>
    </div>
    <div class="col-md-12">
<div class="card">
  <div class="card-header">
      <strong class="card-title">ค่าเฉลี่ยนน้ำหนักส่วนสูง</strong>
  </div>
  <div class="card-body">

    <div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">นักเรียนชาย</h4>
            <canvas id="WHMan"></canvas>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">นักเรียนหญิง</h4>
            <canvas id="WHFemale"></canvas>
        </div>
      </div>
    </div>


    </div>
    </div>
    </div>
<!--      o-net         -->

    </div>
  </div>
</div>


<!--      o-net         -->
          <?php
            $rows = array();
            $tableThai = array();
            $tableThaiAll = array();
            $tableEng = array();
            $tableEngAll = array();
            $tableMathematics  = array();
            $tableMathematicsAll  = array();
            $tableScience = array();
            $tableScienceAll = array();
          ?>
                          @foreach($onets as $onet)
                          <?php array_push($tableThai,$onet->thai); ?>
                          <?php array_push($tableEng,$onet->eng); ?>
                          <?php array_push($tableMathematics,$onet->mathematics); ?>
                          <?php array_push($tableScience,$onet->science); ?>

                          <?php array_push($tableThaiAll,$onet->allthai); ?>
                          <?php array_push($tableEngAll,$onet->alleng); ?>
                          <?php array_push($tableMathematicsAll,$onet->allmathematics); ?>
                          <?php array_push($tableScienceAll,$onet->allscience); ?>

                          @foreach($subjectyears as $subjectyear)
                              @if($subjectyear->id == $onet->subject_year_id)
                                  <?php array_push($rows,$subjectyear->years); ?>
                              @endif

                          @endforeach
                      @endforeach


<!--    user       -->


  <?php $countMan =  $users->whereIn('titlename',['เด็กชาย','นาย'])->count();
        $countgirl =  $users->whereIn('titlename',['เด็กหญิง','นางสาว','นาง'])->count();
  ?>
  @for ($i = 1; $i <= 3; $i++) <?php $kAll = 'k'.$i ?>
          <?php $k[$i] =  $users->whereIn('studentyear',$kAll)->count(); ?>
  @endfor
    @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
          <?php $p[$i] =  $users->whereIn('studentyear',$pAll)->count(); ?>
  @endfor


<!--       น้ำหนัก        -->
<?php $rowsWH = array(); ?>
    <?php $weight = array(); ?>
    <?php $heightt = array(); ?>
    <?php $TotaWeight = array(); ?>
    <?php $TotaHeightt = array(); ?>


@foreach($whyears as $whyear)
<?php array_push($rowsWH,$whyear->date); ?></div>
  @foreach($users as $user)

            @foreach($whs as $wh)
                  @if($wh->wh_year_id == $whyear->id  && $wh->user_id == $user->id )
                                <?php  array_push($weight,$wh->weight); ?>
                                <?php  array_push($heightt,$wh->height); ?>
                   @endif

              @endforeach


    @endforeach
    <?php   array_push($TotaWeight,array_sum($weight)/count($weight)); ?>
    <?php  array_push($TotaHeightt,array_sum($heightt)/count($heightt));?>
    <?php $weight = array(); ?>
    <?php $heightt = array(); ?>
@endforeach



                <?php $weightMan = array(); ?>
                <?php $heighttMan = array(); ?>
                <?php $TotaWeightMan = array(); ?>
                <?php $TotaHeighttMan = array(); ?>


                @foreach($whyears as $whyear)
                  @foreach($userMans as $user)



                    @foreach($whs as $wh)
                          @if($wh->wh_year_id == $whyear->id && $wh->user_id == $user->id )
                                        <?php  array_push($weightMan,$wh->weight); ?>
                                        <?php  array_push($heighttMan,$wh->height); ?>
                           @endif

                      @endforeach




                  @endforeach
                  <?php   array_push($TotaWeightMan,array_sum($weightMan)/count($weightMan)); ?>
                  <?php  array_push($TotaHeighttMan,array_sum($heighttMan)/count($heighttMan));?>
                  <?php $weightMan = array(); ?>
                  <?php $heighttMan = array(); ?>

                @endforeach



        <?php $weightFemale = array(); ?>
        <?php $heighttFemale = array(); ?>
        <?php $TotaWeightFemale = array(); ?>
        <?php $TotaHeighttFemale = array(); ?>


        @foreach($whyears as $whyear)
          @foreach($userFemales as $user)



            @foreach($whs as $wh)
                  @if($wh->wh_year_id == $whyear->id && $wh->user_id == $user->id )
                                <?php  array_push($weightFemale,$wh->weight); ?>
                                <?php  array_push($heighttFemale,$wh->height); ?>
                   @endif

              @endforeach


          @endforeach
          <?php   array_push($TotaWeightFemale,array_sum($weightFemale)/count($weightFemale)); ?>
          <?php  array_push($TotaHeighttFemale,array_sum($heighttFemale)/count($heighttFemale));?>
          <?php $weightFemale = array(); ?>
          <?php $heighttFemale = array(); ?>

        @endforeach



<!--       user        -->



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
var ctx1 = document.getElementById( "ONet1" );
ctx1.height = 150;
var myChart = new Chart( ctx1, {
    type: 'bar',
    data: {
        labels: <?=json_encode($rows)?>,
        datasets: [
            {
                label: "คะแนนเฉลี่ยโรงเรียน ภาษาไทย",
                data: <?=json_encode($tableThai, JSON_NUMERIC_CHECK);?>,
                borderColor: "rgba(0, 123, 255, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(0, 123, 255, 0.5)"
                        },
            {
                label: "คะแนนเฉลี่ยระดับประเทศ ภาษาไทย",
                data: <?=json_encode($tableThaiAll , JSON_NUMERIC_CHECK);?>,
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




var ctx2 = document.getElementById( "ONet2" );
ctx2.height = 150;
var myChart = new Chart( ctx2, {
    type: 'bar',
    data: {
        labels: <?=json_encode($rows)?>,
        datasets: [

                        {
                            label: "คะแนนเฉลี่ยโรงเรียน ภาษาอังกฤษ ",
                            data: <?=json_encode($tableEng, JSON_NUMERIC_CHECK);?>,
                            borderColor: "rgba(0,102,51,0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0,102,51,0.5)"
                                    },
                        {
                            label: "คะแนนเฉลี่ยระดับประเทศ ภาษาอังกฤษ  ",
                            data: <?=json_encode($tableEngAll , JSON_NUMERIC_CHECK);?>,
                            borderColor: "rgba(0,153,51,0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0,153,51,0.5)"
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




var ctx3 = document.getElementById( "ONet3" );
ctx3.height = 150;
var myChart = new Chart( ctx3, {
    type: 'bar',
    data: {
        labels: <?=json_encode($rows)?>,
        datasets: [

                                    {
                                        label: "คะแนนเฉลี่ยโรงเรียน คณิตศาสตร์ ",
                                        data: <?=json_encode($tableMathematics, JSON_NUMERIC_CHECK);?>,
                                        borderColor: "rgba(153,51,153,0.9)",
                                        borderWidth: "0",
                                        backgroundColor: "rgba(153,51,153,0.5)"
                                                },
                                    {
                                        label: "คะแนนเฉลี่ยระดับประเทศ คณิตศาสตร์ ",
                                        data: <?=json_encode($tableMathematicsAll , JSON_NUMERIC_CHECK);?>,
                                        borderColor: "rgba(102,51,204,0.9)",
                                        borderWidth: "0",
                                        backgroundColor: "rgba(102,51,204,0.5)"
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



var ctx4 = document.getElementById( "ONet4" );
ctx4.height = 150;
var myChart = new Chart( ctx4, {
    type: 'bar',
    data: {
        labels: <?=json_encode($rows)?>,
        datasets: [

                                                {
                                                    label: "คะแนนเฉลี่ยโรงเรียน วิทยาศาสตร์ ",
                                                    data: <?=json_encode($tableScience, JSON_NUMERIC_CHECK);?>,
                                                    borderColor: "rgba(255,204,102,0.9)",
                                                    borderWidth: "0",
                                                    backgroundColor: "rgba(255,204,102,0.5)"
                                                            },
                                                {
                                                    label: "คะแนนเฉลี่ยระดับประเทศ วิทยาศาสตร์ ",
                                                    data: <?=json_encode($tableScienceAll , JSON_NUMERIC_CHECK);?>,
                                                    borderColor: "rgba(204,255,102,0.9)",
                                                    borderWidth: "0",
                                                    backgroundColor: "rgba(204,255,102,0.5)"
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


//----------------------------


var ctxC1 = document.getElementById( "count1" );
    ctxC1.height = 150;
    var myChart = new Chart( ctxC1, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [ <?=$countMan;?>, <?=$countgirl;?> ],
                backgroundColor: [
                                    "rgba(0, 123, 255,0.9)",
                                    "rgba(0, 123, 255,0.5)",

                                ],
                hoverBackgroundColor: [
                                    "rgba(0, 123, 255,0.9)",
                                    "rgba(0, 123, 255,0.5)",

                                ]

                            } ],
            labels: [
                            "ชาย",
                            "หญิง",

                        ]
        },
        options: {
            responsive: true
        }
    } );

    var ctxC2 = document.getElementById( "count2" );
        ctxC2.height = 150;
        var myChart = new Chart( ctxC2, {
            type: 'doughnut',
            data: {
                datasets: [ {
                    data: [ <?=$k[1];?>, <?=$k[2];?>,<?=$k[3];?>,<?=$p[1];?>, <?=$p[2];?>,<?=$p[3];?>,<?=$p[4];?>, <?=$p[5];?>,<?=$p[6];?>  ],
                    backgroundColor: [
                                        "rgba(0, 123, 255,0.9)",
                                        "rgba(0, 123, 255,0.6)",
                                        "rgba(0, 123, 255, 0.4)",
                                        "rgba(102,51,204,0.9)",
                                        "rgba(102,51,204,0.6)",
                                        "rgba(102,51,204,0.4)",
                                        "rgba(153,51,153,0.9)",
                                        "rgba(153,51,153,0.6)",
                                        "rgba(153,51,153,0.4)",

                                    ],
                    hoverBackgroundColor: [
                                        "rgba(0, 123, 255,0.9)",
                                        "rgba(0, 123, 255,0.6)",
                                        "rgba(0, 123, 255, 0.4)",
                                        "rgba(102,51,204,0.9)",
                                        "rgba(102,51,204,0.6)",
                                        "rgba(102,51,204,0.4)",
                                        "rgba(153,51,153,0.9)",
                                        "rgba(153,51,153,0.6)",
                                        "rgba(153,51,153,0.4)",

                                    ]

                                } ],
                labels: [
                                "อนุบาล 1","อนุบาล 2","อนุบาล 3","ประถม 1","ประถม 2","ประถม 3","ประถม 4","ประถม 5","ประถม 6",
                            ]
            },
            options: {
                responsive: true
            }
        } );



//----------------------------



var ctxWHMan = document.getElementById( "WHMan" );
ctxWHMan.height = 200;
var myChart = new Chart( ctxWHMan, {
    type: 'bar',
    data: {
        labels: <?=json_encode($rowsWH)?>,
        datasets: [
            {
                label: "น้ำหนัก",
                data: <?=json_encode($TotaWeightMan, JSON_NUMERIC_CHECK);?>,
                borderColor: "rgba(0, 123, 255, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(0, 123, 255, 0.5)"
                        },
            {
                label: "ส่วนสูง",
                data: <?=json_encode($TotaHeighttMan, JSON_NUMERIC_CHECK);?>,
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


var ctxWHFemale = document.getElementById( "WHFemale" );
ctxWHFemale.height = 200;
var myChart = new Chart( ctxWHFemale, {
    type: 'bar',
    data: {
        labels: <?=json_encode($rowsWH)?>,
        datasets: [
            {
                label: "น้ำหนัก",
                data: <?=json_encode($TotaWeightFemale, JSON_NUMERIC_CHECK);?>,
                borderColor: "rgba(0, 123, 255, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(0, 123, 255, 0.5)"
                        },
            {
                label: "ส่วนสูง",
                data: <?=json_encode($TotaHeighttFemale, JSON_NUMERIC_CHECK);?>,
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
