@extends('layouts.src')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <strong>{{isset($post)?"Edit ":"Create "}}</strong>
    </div>
                    <div class="card-body card-block">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="studentcode" class="col-md-4 col-form-label text-md-right">{{ __('Student Code') }}</label>

                            <div class="col-md-6">
                                <input id="studentcode" type="text" class="form-control @error('studentcode') is-invalid @enderror" name="studentcode" value="{{ old('studentcode') }}" required autocomplete="studentcode" autofocus>

                                @error('studentcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="idcard" class="col-md-4 col-form-label text-md-right">{{ __('idcard') }}</label>

                            <div class="col-md-6">
                                <input id="idcard" type="text" class="form-control @error('idcard') is-invalid @enderror" name="idcard" value="{{ old('idcard') }}" required autocomplete="idcard" autofocus>

                                @error('idcard')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('ระดับชั้น') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" data-placeholder="กรุณาเลือกระดับชั้น" name="studentyear">
                                  @if(empty($post))
                                    <option value=""></option>
                                  @endif
                                  @for ($i = 1; $i <= 3; $i++) <?php $kAll = 'k'.$i ?>
                                      <option value="{{$kAll}}">อนุบาล {{$i}}</option>
                                  @endfor
                                  @for ($i = 1; $i <= 6; $i++) <?php $pAll = 'p'.$i ?>
                                      <option value="{{$pAll}}">ประถม {{$i}}</option>
                                  @endfor
                              </select>
                              @error('studentyear')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('คำนามหน้า') }}</label>

                            <div class="col-md-6">
                              <select class="form-control standardSelect" data-placeholder="กรุณาเลือกคำนำหน้า" name="titlename">
                                  @if(empty($post))
                                    <option value=""></option>
                                  @endif

                                      <option value="เด็กชาย">เด็กชาย</option>
                                      <option value="เด็กหญิง">เด็กหญิง</option>
                                      <option value="นาย">นาย</option>
                                      <option value="นางสาว">นางสาว</option>
                                      <option value="นางสาว">นางสาว</option>

                              </select>
                              @error('titlename')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

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
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
