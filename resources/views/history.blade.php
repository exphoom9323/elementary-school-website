@extends('layouts.welcomeindex')
@section('content')


		<section class="post-content-area single-post-area">
			<div class="container">



													<div class="row">
																<div class="col-lg-12 accordion-left">

						                            <!-- accordion 2 start-->
						                            <dl class="accordion">
						                                <dt>
						                                    <a href="">ประวัติโรงเรียนโดยย่อ</a>
						                                </dt>
						                                <dd>
																	ประวัติโรงเรียนโดยย่อ
						                                </dd>
						                                <dt>
						                                    <a href="">หตุการณ์ที่สำคัญที่เกิดขึ้น</a>
						                                </dt>
						                                <dd>
																	หตุการณ์ที่สำคัญที่เกิดขึ้น
						                                </dd>
						                                <dt>
						                                    <a href="">วิสัยทัศน์</a>
						                                </dt>
						                                <dd>
																	วิสัยทัศน์
						                                </dd>
						                                <dt>
						                                    <a href="">ปรัชญา</a>
						                                </dt>
						                                <dd>
						                                    การศึกษาเพื่อพัฒนาคุณภาพชีวิต
						                                </dd>
																						<dt>
						                                    <a href="">พันธกิจ</a>
						                                </dt>
						                                <dd>
																			พันธกิจ
						                                </dd>
																						<dt>
						                                    <a href="">เป้าหมาย</a>
						                                </dt>
						                                <dd>
																	เป้าหมาย
						                                </dd>
						                            </dl>
						                            <!-- accordion 2 end-->
						                        </div>
						                    </div>



				</div>
		</section>


		<section class="post-content-area single-post-area">
			<div class="container">
					<h2 class="mb-3">คะแนน O-net</h4>
				<div class="row">
					<div class="col-lg-6 event-details-left">

						<div class="card">
								<div class="card-body">
										<h4 class="mb-3">ภาษาไทย</h4>
							<canvas id="ONet1"></canvas>
							</div>
						</div>
						<br>
						<div class="card">
								<div class="card-body">
										<h4 class="mb-3">คณิตศาสตร์</h4>
							<canvas id="ONet3"></canvas>
							</div>
						</div>


					</div>
					<div class="col-lg-6 sidebar-widgets">

							<div class="card">
									<div class="card-body">
											<h4 class="mb-3">ภาษาไทย</h4>
								<canvas id="ONet2"></canvas>
								</div>
							</div>
							<br>
							<div class="card">
									<div class="card-body">
											<h4 class="mb-3">วิทยาศาสตร์</h4>
								<canvas id="ONet4"></canvas>
								</div>
							</div>

					</div>
				</div>
		</section>

		<section class="post-content-area single-post-area">
			<div class="container">
					<h2 class="mb-3">จำนวนนักเรียน ({{$users->count()}})</h4>
				<div class="row">
					<div class="col-lg-6 event-details-left">

						<div class="card">
								<div class="card-body">
										<h4 class="mb-3">กราฟแสดงจำนวนนักเรียนชายและหญิง</h4>
							<canvas id="count1"></canvas>
							</div>
						</div>


					</div>
					<div class="col-lg-6 sidebar-widgets">

							<div class="card">
									<div class="card-body">
											<h4 class="mb-3">กราฟแสดงจำนวนนักเรียนชายและหญิงในแต่ละชั้น</h4>
								<canvas id="count2"></canvas>
								</div>
							</div>

					</div>
				</div>
		</section>

		<section class="post-content-area single-post-area">
			<div class="container">
					<h2 class="mb-3">ค่าเฉลี่ยนน้ำหนักส่วนสูง</h4>
				<div class="row">
					<div class="col-lg-6 event-details-left">

						<div class="card">
								<div class="card-body">
										<h4 class="mb-3">นักเรียนชาย</h4>
							<canvas id="WHMan"></canvas>
							</div>
						</div>


					</div>
					<div class="col-lg-6 sidebar-widgets">

							<div class="card">
									<div class="card-body">
											<h4 class="mb-3">นักเรียนหญิง</h4>
								<canvas id="WHFemale"></canvas>
								</div>
							</div>

					</div>
				</div>
		</section>

		<section class="post-content-area single-post-area">
			<div class="container">
					<h2 class="mb-3">เกรดเฉลี่ยนหนักเรียน</h4>
				<div class="row">
					<div class="col-lg-6 event-details-left">

						<div class="card">
								<div class="card-body">
										<h4 class="mb-3">ประถม 1</h4>
							<canvas id="GPAp1On"></canvas>
							</div>
						</div>
						<br>
						<div class="card">
								<div class="card-body">
										<h4 class="mb-3">ประถม 3</h4>
							<canvas id="GPAp3On"></canvas>
							</div>
						</div>
						<br>
						<div class="card">
								<div class="card-body">
										<h4 class="mb-3">ประถม 5</h4>
							<canvas id="GPAp5On"></canvas>
							</div>
						</div>


					</div>
					<div class="col-lg-6 sidebar-widgets">

							<div class="card">
									<div class="card-body">
											<h4 class="mb-3">ประถม 2</h4>
								<canvas id="GPAp2On"></canvas>
								</div>
							</div>
							<br>
							<div class="card">
									<div class="card-body">
											<h4 class="mb-3">ประถม 4</h4>
								<canvas id="GPAp4On"></canvas>
								</div>
							</div>
							<br>
							<div class="card">
									<div class="card-body">
											<h4 class="mb-3">ประถม 6</h4>
								<canvas id="GPAp6On"></canvas>
								</div>
							</div>

					</div>
				</div>
		</section>




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
											<?php   array_push($TotaWeightMan,number_format(array_sum($weightMan)/count($weightMan),2)); ?>
											<?php  array_push($TotaHeighttMan,number_format(array_sum($heighttMan)/count($heighttMan),2));?>
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
							<?php   array_push($TotaWeightFemale,number_format(array_sum($weightFemale)/count($weightFemale),2)); ?>
							<?php  array_push($TotaHeighttFemale,number_format(array_sum($heighttFemale)/count($heighttFemale),2));?>
							<?php $weightFemale = array(); ?>
							<?php $heighttFemale = array(); ?>

						@endforeach


						<!-- ประถม 1 -->
						<?php $GPAp1 = array(); ?>
						<?php $GPAp1S = array(); ?>
						<?php $GPAp1Years = array(); ?>
						@foreach($subjectyearsGPA as $subjectyear)
						<?php array_push($GPAp1Years,$subjectyear->years); ?></div>
										@foreach($studentyears->whereIn('subject_year_id',$subjectyear->id)->whereIn('studentyear','p1') as $give)
									 		 	<?php array_push($GPAp1,$give->GPA);?>
								   @endforeach

									 	<?php   array_push($GPAp1S,number_format(array_sum($GPAp1)/count($GPAp1),2)); ?>
										<?php $GPAp1 = array(); ?>
			      @endforeach
						<!-- ประถม 2 -->
						<?php $GPAp2 = array(); ?>
						<?php $GPAp2S = array(); ?>
						<?php $GPAp2Years = array(); ?>
						@foreach($subjectyearsGPA as $subjectyear)
						<?php array_push($GPAp2Years,$subjectyear->years); ?></div>
										@foreach($studentyears->whereIn('subject_year_id',$subjectyear->id)->whereIn('studentyear','p2') as $give)
												<?php array_push($GPAp2,$give->GPA);?>
									 @endforeach

										<?php   array_push($GPAp2S,number_format(array_sum($GPAp2)/count($GPAp2),2)); ?>
										<?php $GPAp2 = array(); ?>
						@endforeach
						<!-- ประถม 3 -->
						<?php $GPAp3 = array(); ?>
						<?php $GPAp3S = array(); ?>
						<?php $GPAp3Years = array(); ?>
						@foreach($subjectyearsGPA as $subjectyear)
						<?php array_push($GPAp3Years,$subjectyear->years); ?></div>
										@foreach($studentyears->whereIn('subject_year_id',$subjectyear->id)->whereIn('studentyear','p3') as $give)
												<?php array_push($GPAp3,$give->GPA);?>
									 @endforeach

										<?php   array_push($GPAp3S,number_format(array_sum($GPAp3)/count($GPAp3),2)); ?>
										<?php $GPAp3 = array(); ?>
						@endforeach
						<!-- ประถม 4 -->
						<?php $GPAp4 = array(); ?>
						<?php $GPAp4S = array(); ?>
						<?php $GPAp4Years = array(); ?>
						@foreach($subjectyearsGPA as $subjectyear)
						<?php array_push($GPAp4Years,$subjectyear->years); ?></div>
										@foreach($studentyears->whereIn('subject_year_id',$subjectyear->id)->whereIn('studentyear','p4') as $give)
												<?php array_push($GPAp4,$give->GPA);?>
									 @endforeach

										<?php   array_push($GPAp4S,number_format(array_sum($GPAp4)/count($GPAp4),2)); ?>
										<?php $GPAp4 = array(); ?>
						@endforeach
						<!-- ประถม 5 -->
						<?php $GPAp5 = array(); ?>
						<?php $GPAp5S = array(); ?>
						<?php $GPAp5Years = array(); ?>
						@foreach($subjectyearsGPA as $subjectyear)
						<?php array_push($GPAp5Years,$subjectyear->years); ?></div>
										@foreach($studentyears->whereIn('subject_year_id',$subjectyear->id)->whereIn('studentyear','p5') as $give)
												<?php array_push($GPAp5,$give->GPA);?>
									 @endforeach

										<?php   array_push($GPAp5S,number_format(array_sum($GPAp5)/count($GPAp5),2)); ?>
										<?php $GPAp5 = array(); ?>
						@endforeach
						<!-- ประถม 6 -->
						<?php $GPAp6 = array(); ?>
						<?php $GPAp6S = array(); ?>
						<?php $GPAp6Years = array(); ?>
						@foreach($subjectyearsGPA as $subjectyear)
						<?php array_push($GPAp6Years,$subjectyear->years); ?></div>
										@foreach($studentyears->whereIn('subject_year_id',$subjectyear->id)->whereIn('studentyear','p6') as $give)
												<?php array_push($GPAp6,$give->GPA);?>
									 @endforeach

										<?php   array_push($GPAp6S,number_format(array_sum($GPAp6)/count($GPAp6),2)); ?>
										<?php $GPAp6 = array(); ?>
						@endforeach


		<!--       user        -->

@endsection



@section('js')

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
//----------------------------


var GPAp1On = document.getElementById( "GPAp1On" );
GPAp1On.height = 200;
var myChart = new Chart( GPAp1On, {
    type: 'bar',
    data: {
        labels: <?=json_encode($GPAp1Years)?>,
        datasets: [
            {
                label: "GPA เฉลี่ย",
                data: <?=json_encode($GPAp1S, JSON_NUMERIC_CHECK);?>,
                borderColor: "rgba(0, 123, 255, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(0, 123, 255, 0.5)"
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



var GPAp2On = document.getElementById( "GPAp2On" );
GPAp2On.height = 200;
var myChart = new Chart( GPAp2On, {
    type: 'bar',
    data: {
        labels: <?=json_encode($GPAp2Years)?>,
        datasets: [
            {
                label: "GPA เฉลี่ย",
                data: <?=json_encode($GPAp2S, JSON_NUMERIC_CHECK);?>,
								borderColor: "rgba(0,102,51,0.9)",
								borderWidth: "0",
								backgroundColor: "rgba(0,102,51,0.5)"
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



var GPAp3On = document.getElementById( "GPAp3On" );
GPAp3On.height = 200;
var myChart = new Chart( GPAp3On, {
    type: 'bar',
    data: {
        labels: <?=json_encode($GPAp3Years)?>,
        datasets: [
            {
                label: "GPA เฉลี่ย",
                data: <?=json_encode($GPAp3S, JSON_NUMERIC_CHECK);?>,
								borderColor: "rgba(255,204,102,0.9)",
								borderWidth: "0",
								backgroundColor: "rgba(255,204,102,0.5)"
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



var GPAp4On = document.getElementById( "GPAp4On" );
GPAp4On.height = 200;
var myChart = new Chart( GPAp4On, {
    type: 'bar',
    data: {
        labels: <?=json_encode($GPAp4Years)?>,
        datasets: [
            {
                label: "GPA เฉลี่ย",
                data: <?=json_encode($GPAp4S, JSON_NUMERIC_CHECK);?>,
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


var GPAp5On = document.getElementById( "GPAp5On" );
GPAp5On.height = 200;
var myChart = new Chart( GPAp5On, {
    type: 'bar',
    data: {
        labels: <?=json_encode($GPAp5Years)?>,
        datasets: [
            {
                label: "GPA เฉลี่ย",
                data: <?=json_encode($GPAp5S, JSON_NUMERIC_CHECK);?>,
                borderColor: "rgba(102,51,204,0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(102,51,204,0.6)"
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

var GPAp6On = document.getElementById( "GPAp6On" );
GPAp6On.height = 200;
var myChart = new Chart( GPAp6On, {
    type: 'bar',
    data: {
        labels: <?=json_encode($GPAp6Years)?>,
        datasets: [
            {
                label: "GPA เฉลี่ย",
                data: <?=json_encode($GPAp6S, JSON_NUMERIC_CHECK);?>,
                borderColor: "rgba(153,51,153,0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(153,51,153,0.6)"
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
