@extends('layouts.welcomeindex')
@section('content')

<section class="sample-text-area">
				<div class="container">


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
	                        <div>
	                            <div class="card-body">
																<h3 class="text-heading">{{ Auth::user()->titlename }}{{ Auth::user()->firstname}}&nbsp;{{ Auth::user()->lastname}}   <?php if(substr(Auth::user()->studentyear,0,1) == 'k' ){
																																																																															echo "  อนุบาล ".substr(Auth::user()->studentyear, 1);
																																																																														}else if(substr(Auth::user()->studentyear,0,1) == 'p' ){
																																																																																echo "  ประถม ".substr(Auth::user()->studentyear, 1);
																																																																														}?></h3>
	                                <div class="custom-tab">

	                                    <nav>
	                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
	                                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">กราฟน้ำหนักส่วนสูง</a>

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

	                                            <canvas id="barChart"></canvas>
	                                        </div>


	                                        </div>



	                                        @foreach($studentyears as $studentyear)
																						@if($subjectyear->find($studentyear->subject_year_id)->setting == "finish")
	                          <!-- -->             <div class="tab-pane fade" id="{{ 'a'.$studentyear->id }}" role="tabpanel" aria-labelledby="{{ 'a'.$studentyear->id }}-tab">

	                                  <form >
	                                    @csrf

	                                          @method('PUT')



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
	                                                          <td>{{$subject->find($studentscore->subject_id)->name}}  </td>
	                                                          <td>
																															@if($studentscore->score == '-1')
																															0
																															@else
																															{{$studentscore->score}}
																															@endif
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
	                                                            </td>

	                                                          </tr>
	                                                          @endif
	                                                      @endforeach
	                                                        </tbody>
	                                                </table>
	                                                @else
	                                                <h3 class="text text-content">ยังไม่มีข้อมูล</h3>
	                                              @endif





	                                                </form>



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


				</div>


			</section>


@endsection


@section('js')

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
