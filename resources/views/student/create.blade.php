@extends('layouts.src')

@section('content')


<div class="col-lg-12">
<div class="card">
    <div class="card-header">
      @if(auth()->user()->isA())
        <strong>{{isset($users)?"แก้ไขนักเรียน ":"เพิ่มนักเรียน "}}</strong>
      @else
        <strong>ข้อมูลนักเรียน</strong>
      @endif
    </div>
                    <div class="card-body card-block">

                        <form action="{{isset($users)?route('student.update',$users->id):route('student.store')}}" method="post">
                        @csrf
                        @if(@isset($users))
                            @method('PUT')
                        @endif

                      <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="studentcode" >{{ __('รหัสนักเรียน:') }}</label>


                                <input id="studentcode" type="text" class="form-control @error('studentcode') is-invalid @enderror" name="studentcode" value="{{isset($users)?$users->studentcode:''}}" required autocomplete="studentcode" autofocus
                                @if(auth()->user()->isA() && empty($users))
                                @else
                                 disabled
                                 @endif>

                                @error('studentcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="idcard" >{{ __('รหัสบัตรประชาชน:') }}</label>


                                <input id="idcard" type="text" class="form-control @error('idcard') is-invalid @enderror" name="idcard" value="{{isset($users)?$users->idcard:''}}" required autocomplete="idcard" autofocus
                                @if(auth()->user()->isA())
                                @else
                                 disabled
                                 @endif>

                                @error('idcard')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="firstname" >{{ __('ระดับชั้น:') }}</label>


                              <select class="form-control " data-placeholder="กรุณาเลือกระดับชั้น" name="studentyear"
                              @if(auth()->user()->isA())
                              @else
                               disabled
                               @endif>

                                  @if(empty($users))
                                    <option value=""></option>
                                  @endif
                                  @for ($i = 1; $i <= 3; $i++) <?php $kAll = 'k'.$i ?>
                                      <option value="{{$kAll}}"
                                      @if(isset($users))
                                        @if($users->studentyear == $kAll)
                                          selected
                                        @endif
                                    @endif
                                      >อนุบาล {{$i}}</option>
                                  @endfor
                                  @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
                                      <option value="{{$pAll}}"
                                      @if(isset($users))
                                        @if($users->studentyear == $pAll)
                                          selected
                                        @endif
                                    @endif
                                      >ประถม {{$i}}</option>
                                  @endfor

                                                      @if(isset($users))
                                                                <option value="พักการเรียน"
                                                                @if(isset($users))
                                                                  @if($users->studentyear == 'พักการเรียน')
                                                                    selected
                                                                  @endif
                                                              @endif
                                                                >พักการเรียน</option>
                                                      @endif

                              </select>
                              @error('studentyear')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                      </div>





                      <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="firstname" >{{ __('คำนำหน้า:') }}</label>

                              <select class="form-control" data-placeholder="กรุณาเลือกคำนำหน้า" name="titlename"
                              @if(auth()->user()->isA())
                              @else
                               disabled
                               @endif>

                                  @if(empty($users))
                                    <option value=""></option>
                                  @endif

                                      <option value="เด็กชาย"
                                      @if(isset($users))
                                        @if($users->titlename  == 'เด็กชาย')
                                          selected
                                        @endif
                                    @endif
                                      >เด็กชาย</option>
                                      <option value="เด็กหญิง"
                                      @if(isset($users))
                                        @if($users->titlename  == 'เด็กหญิง')
                                          selected
                                        @endif
                                    @endif
                                    >เด็กหญิง</option>
                                      <option value="นาย"
                                      @if(isset($users))
                                        @if($users->titlename  == 'นาย')
                                          selected
                                        @endif
                                    @endif
                                    >นาย</option>
                                      <option value="นางสาว"
                                      @if(isset($users))
                                        @if($users->titlename  == 'นางสาว')
                                          selected
                                        @endif
                                    @endif
                                    >นางสาว</option>
                                      <option value="นาง"
                                      @if(isset($users))
                                        @if($users->titlename  == 'นาง')
                                          selected
                                        @endif
                                    @endif
                                    >นาง</option>

                              </select>
                              @error('titlename')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="firstname" >{{ __('ชื่อ:') }}</label>


                                <input id="firstddname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{isset($users)?$users->firstname:''}}" required autocomplete="firstname" autofocus
                                @if(auth()->user()->isA())
                                @else
                                 disabled
                                 @endif>


                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="lastname" >{{ __('นามสกุล:') }}</label>


                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{isset($users)?$users->lastname:''}}" required autocomplete="lastname" autofocus
                                @if(auth()->user()->isA())
                                @else
                                 disabled
                                 @endif>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>


                      <div class="row">
                          <div class="col-md-3 mb-3">
                            <label for="birthday">วันเกิด (ปี-เดือน-วัน):</label>
                            <input type="text" class="form-control" id="birthday" name="birthday" value="{{isset($profile)?$profile->birthday:''}}"
                            @if(auth()->user()->isA())
                            @else
                             disabled
                             @endif>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="race">เชื้อชาติ:</label>
                            <input type="text" class="form-control" id="race" name="race" value="{{isset($profile)?$profile->race:''}}"
                            @if(auth()->user()->isA())
                            @else
                             disabled
                             @endif>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="nationality">สัญชาติ:</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" value="{{isset($profile)?$profile->nationality:''}}"
                            @if(auth()->user()->isA())
                            @else
                             disabled
                             @endif>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="HomeID">ศาสนา:</label>
                              <select class="form-control" data-placeholder="" name="cult"
                              @if(auth()->user()->isA())
                              @else
                               disabled
                               @endif>
                                  @if(empty($users))
                                    <option value=""></option>
                                  @endif

                                      <option value="พุทธ"
                                      @if(isset($profile))
                                        @if($profile->cult  == 'พุทธ')
                                          selected
                                        @endif
                                    @endif
                                      >พุทธ</option>
                                      <option value="คริสต์"
                                      @if(isset($profile))
                                        @if($profile->cult  == 'คริสต์')
                                          selected
                                        @endif
                                    @endif
                                    >คริสต์</option>
                                      <option value="อิสลาม"
                                      @if(isset($profile))
                                        @if($profile->cult  == 'อิสลาม')
                                          selected
                                        @endif
                                    @endif
                                    >อิสลาม</option>
                                      <option value="ฮินดู"
                                      @if(isset($profile))
                                        @if($profile->cult  == 'ฮินดู')
                                          selected
                                        @endif
                                    @endif
                                    >ฮินดู</option>
                                      <option value="อื่น ๆ"
                                      @if(isset($profile))
                                        @if($profile->cult  == 'อื่น ๆ')
                                          selected
                                        @endif
                                    @endif
                                    >อื่น ๆ</option>

                              </select>
                          </div>
                      </div>

	                     <div class="row">
                         <div class="col-md-12 mb-3">
                            <label for="disease">โรคประจำตัว (ถ้ามี) :</label>
                            <input type="text" class="form-control" id="disease" name="disease" value="{{isset($profile)?$profile->disease:''}}"
                            @if(auth()->user()->isA())
                            @else
                             disabled
                             @endif>
                        </div>
                       </div>




                        <hr class="mb-4">

                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="HomeID">บ้านเลขที่:</label>
                            <input type="text" class="form-control" id="HomeID" name="HomeID" value="{{isset($profile)?$profile->HomeID:''}}"
                            @if(auth()->user()->isA())
                            @else
                             disabled
                             @endif>
                        </div>
                        <div class="col-md-2 mb-3">
                          <label for="village">หมู่ที่:</label>
                          <input type="text" class="form-control" id="moo" name="moo" value="{{isset($profile)?$profile->moo:''}}"
                          @if(auth()->user()->isA())
                          @else
                           disabled
                           @endif>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="village">ซอย/หมู่บ้าน:</label>
                          <input type="text" class="form-control" id="village" name="village" value="{{isset($profile)?$profile->village:''}}"
                          @if(auth()->user()->isA())
                          @else
                           disabled
                           @endif>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="road">ถนน:</label>
                          <input type="text" class="form-control" id="road" name="road" value="{{isset($profile)?$profile->road:''}}"
                          @if(auth()->user()->isA())
                          @else
                           disabled
                           @endif>
                        </div>
                    </div>

                    <div class="row">
                          <div class="col-md-3 mb-3">
                              <label for="HomeID">ตำบล:</label>
                              <input type="text" class="form-control" id="parish" name="parish" value="{{isset($profile)?$profile->parish:''}}"
                              @if(auth()->user()->isA())
                              @else
                               disabled
                               @endif>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="village">อำเภอ:</label>
                            <input type="text" class="form-control" id="district" name="district" value="{{isset($profile)?$profile->district:''}}"
                            @if(auth()->user()->isA())
                            @else
                             disabled
                             @endif>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="village">จังหวัด:</label>
                            <input type="text" class="form-control" id="province" name="province" value="{{isset($profile)?$profile->province:''}}"
                            @if(auth()->user()->isA())
                            @else
                             disabled
                             @endif>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="road">รหัสไปรษณีย์:</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{isset($profile)?$profile->zipcode:''}}"
                            @if(auth()->user()->isA())
                            @else
                             disabled
                             @endif>
                          </div>
                    </div>



                    <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="father">ชื่อ-สกุลบิดา :</label>

                      <input type="text" class="form-control" id="father" name="father" value="{{isset($profile)?$profile->father:''}}"
                      @if(auth()->user()->isA())
                      @else
                       disabled
                       @endif>


                    </div>
                    <div class="col-md-2 mb-3">
                      <label for="father_old">เบอร์ติดต่อ :</label>
                      <input type="text" class="form-control" id="father_tel" name="father_tel"  value="{{isset($profile)?$profile->father_tel:''}}"
                      @if(auth()->user()->isA())
                      @else
                       disabled
                       @endif>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="father_job">อาชีพบิดา :</label>
                      <input type="text" class="form-control" id="father_job" name="father_job" value="{{isset($profile)?$profile->father_job:''}}"
                      @if(auth()->user()->isA())
                      @else
                       disabled
                       @endif>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6 mb-3">
                  <label for="father">ชื่อ-มารดา :</label>

                    <input type="text" class="form-control" id="mother" name="mother" value="{{isset($profile)?$profile->mother:''}}"
                    @if(auth()->user()->isA())
                    @else
                     disabled
                     @endif>


                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="father_old">เบอร์ติดต่อ :</label>
                    <input type="text" class="form-control" id="mother_tel" name="mother_tel"  value="{{isset($profile)?$profile->mother_tel:''}}"
                    @if(auth()->user()->isA())
                    @else
                     disabled
                     @endif>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="father_job">อาชีพบิดา :</label>
                    <input type="text" class="form-control" id="mother_job" name="mother_job" value="{{isset($profile)?$profile->mother_job:''}}"
                    @if(auth()->user()->isA())
                    @else
                     disabled
                     @endif>
                  </div>
                </div>



              <!-- <div class="row">
              <div class="col-md-6 mb-3">
              <label for="father">ชื่อ-สกุลบิดา :</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
          						<div class="custom-control custom-checkbox">
          						  <input type="checkbox" class="custom-control-input"  name="father_parent" id="parent1">
          						  <label class="custom-control-label" for="parent1">ผู้ปกครอง</label>
          						</div>
					         </span>
                </div>
                <input type="text" class="form-control" id="father" name="father" >
              </div>

              </div>
              <div class="col-md-2 mb-3">
                <label for="father_old">เบอร์ติดต่อ :</label>
                <input type="text" class="form-control" id="father_tel" name="father_tel"  >
              </div>
              <div class="col-md-4 mb-3">
                <label for="father_job">อาชีพบิดา :</label>
                <input type="text" class="form-control" id="father_job" name="father_job">
              </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
            <label for="father">ชื่อ-มารดา :</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input"  name="father_parent" id="parent2">
                      <label class="custom-control-label" for="parent2">ผู้ปกครอง</label>
                    </div>
                 </span>
              </div>
              <input type="text" class="form-control" id="mother" name="mother" >
            </div>

            </div>
            <div class="col-md-2 mb-3">
              <label for="father_old">เบอร์ติดต่อ :</label>
              <input type="text" class="form-control" id="mother_tel" name="mother_tel"  >
            </div>
            <div class="col-md-4 mb-3">
              <label for="father_job">อาชีพบิดา :</label>
              <input type="text" class="form-control" id="mother_job" name="mother_job">
            </div>
          </div> -->

          <div class="row">
          <div class="col-md-6 mb-3">
            <label for="father_old">ชื่อผู้ปกครอง:</label>
            <input type="text" class="form-control" id="guardian" name="guardian" value="{{isset($profile)?$profile->guardian:''}}"
            @if(auth()->user()->isA())
            @else
             disabled
             @endif>
          </div>
          <div class="col-md-2 mb-3">
            <label for="father_old">เบอร์ติดต่อ :</label>
            <input type="text" class="form-control" id="guardian_tel" name="guardian_tel"  value="{{isset($profile)?$profile->guardian_tel:''}}"
            @if(auth()->user()->isA())
            @else
             disabled
             @endif>
          </div>
          <div class="col-md-4 mb-3">
            <label for="father_job">อาชีพผู้ปกครอง :</label>
            <input type="text" class="form-control" id="guardian_job" name="guardian_job" value="{{isset($profile)?$profile->guardian_job:''}}"
            @if(auth()->user()->isA())
            @else
             disabled
             @endif>
          </div>
        </div>


        @if(auth()->user()->isA())
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ยืนยัน') }}
                                </button>
                            </div>
                        </div>
                         @endif
                    </form>
                </div>
            </div>
        </div>



@endsection


  @section('js')

      <!-- <script type="text/javascript">


      jQuery(document).ready(function($) {



        var fatherval = $("#father").val();
        var motherval = $("#mother").val();


        // if(user_name !== ""){
        //     $("[name=data_1]").attr("disabled",true).val(user_name);
        //      var x = document.getElementById("data1");
        //      x.checked = true;
        //
        // }else{
        //     $("[name=data_1]").attr("disabled",false);
        // }



        $(document).ready(function(){
            $("[id=parent1]").click(function(){
              var fatherval = $("#father").val();
                var chk = $(this).is(":checked");
                if(chk == true) {
                    $("[name=guardian").attr("disabled",true).val(fatherval).prop("value", "sss");
                    $("[name=guardian_tel").attr("disabled",true).val( $("#father_tel").val() );
                    $("[name=guardian_job").attr("disabled",true).val( $("#father_job").val() );
                }
                else {
                    $("[name=guardian").attr("disabled",false).val("");
                    $("[name=guardian_tel").attr("disabled",false).val("");
                    $("[name=guardian_job").attr("disabled",false).val("");

                }
            });
            $("[id=parent2]").click(function(){
              var motherval = $("#mother").val();
                var chk = $(this).is(":checked");
                if(chk == true) {
                    $("[name=guardian").attr("disabled",true).val(motherval);
                    $("[name=guardian_tel").attr("disabled",true).val( $("#mother_tel").val() );
                    $("[name=guardian_job").attr("disabled",true).val( $("#mother_job").val() );
                }
                else {
                    $("[name=guardian").attr("disabled",false).val("");
                    $("[name=guardian_tel").attr("disabled",false).val("");
                    $("[name=guardian_job").attr("disabled",false).val("");

                }
            });
        });

//-------------------- chheckbook เลือกได้แค่ 1
        $("input:checkbox").on('click', function() {
        var $box = $(this);
        if ($box.is(":checked")) {
          var group = "input:checkbox[name='" + $box.attr("name") + "']";
          $(group).prop("checked", false);
          $box.prop("checked", true);
        } else {
          $box.prop("checked", false);
        }
      });



      });
      </script> -->

  @endsection
