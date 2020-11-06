@extends('layouts.src')
@section('content')

<div class="content mt-3">
            <div class="animated fadeIn">

              @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <strong>{{isset($whyear)?"แก้ไขช่วงเวลา":"ช่วงเวลาที่เพิ่ม"}}</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{isset($whyear)?route('wh.update',$whyear->id):route('wh.store')}}" method="post">
              @csrf
                @if(@isset($whyear))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="years">เวลาที่วัดน้ำหนีกส่วนสูง</label>
                    <div class="input-group">
                        <input type="text" name="date" value="{{isset($whyear)?$whyear->date:''}}" class="form-control datepicker" data-date-language="th" required autocomplete="date">
                        <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                    </div>
                </div>






    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fa fa-dot-circle-o"></i> ยืนยัน
        </button>
        <!-- <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button> -->
    </div>
      </form>
</div>

</div>
</div>
</div>

    @endsection



    @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" charset="utf-8"></script>

        <script src="{{asset('src/vendors/dist/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('src/vendors/dist/js/bootstrap-datepicker-thai.js')}}"></script>
        <script src="{{asset('src/vendors/dist/locales/bootstrap-datepicker.th.js')}}"></script>



        <script>
        jQuery(document).ready(function($) {
            $('.datepicker').datepicker({
              format: 'mm/yyyy',
              viewMode: "months",
              minViewMode: "months",
            });
            $('.fa-calendar').click(function() {
                  $(".datepicker").focus();
            });
        });
</script>

    @endsection
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
        <link rel="stylesheet" href="{{asset('src/vendors/dist/css/datepicker.css')}}">
    @endsection
