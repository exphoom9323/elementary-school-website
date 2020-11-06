@extends('layouts.src')

@section('content')




<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <strong>{{isset($users)?"แก้ไขขอ้มูลบุคลากร ":"เพิ่มบุคลากร "}}</strong>
    </div>
                    <div class="card-body card-block">

                        <form action="{{isset($users)?route('personnel.update',$users->id):route('personnel.store')}}" method="post">
                        @csrf
                        @if(@isset($users))
                            @method('PUT')
                        @endif

                        <div class="row">
                          <div class="col-md-3 mb-3">
                            <label for="studentcode" >{{ __('รหัสเข้าใช้งาน:') }}</label>


                                <input id="studentcode" type="text" class="form-control @error('studentcode') is-invalid @enderror" name="studentcode" value="{{isset($users)?$users->studentcode:''}}" required autocomplete="studentcode" autofocus

                                @if(isset($users))
                                disabled
                                @endif
                                >

                                @error('studentcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                          <div class="col-md-5 mb-3">
                            <label for="idcard" >{{ __('รหัสบัตรประชาชน:') }}</label>


                                <input id="idcard" type="text" class="form-control @error('idcard') is-invalid @enderror" name="idcard" value="{{isset($users)?$users->idcard:''}}" required autocomplete="idcard" autofocus>

                                @error('idcard')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        <div class="col-md-4 mb-3">
                            <label for="firstname" >{{ __('ตำแหน่ง:') }}</label>


                              <select class="form-control " data-placeholder="กรุณาเลือกระดับชั้น" name="type">
                                  @if(empty($users))
                                    <option value=""></option>
                                  @endif
                                  @for ($i = 1; $i <= 2; $i++)<?php if($i == 1){ $x = 'admin';}else{ $x = 'teacher'; } ?>

                                      <option value="{{ $x }}"
                                        @if(isset($users))
                                          @if($users->type == $x)
                                            selected
                                          @endif
                                      @endif
                                  > @if($i == 1) ผู้ดูแลระบบ @else ครู @endif </option>
                              @endfor
                              </select>
                              @error('type')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>


                        <div class="row">
                          <div class="col-md-2 mb-3">
                            <label for="firstname" >{{ __('คำนำหน้า:') }}</label>


                              <select class="form-control " data-placeholder="กรุณาเลือกคำนำหน้า" name="titlename">
                                  @if(empty($users))
                                    <option value=""></option>
                                  @endif


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


                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{isset($users)?$users->firstname:''}}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                          <div class="col-md-5 mb-3">
                            <label for="lastname" >{{ __('นามสกุล') }}</label>


                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{isset($users)?$users->lastname:''}}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ยืนยัน') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
