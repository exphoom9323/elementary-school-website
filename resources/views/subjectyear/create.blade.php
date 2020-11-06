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
        <strong>{{isset($subjectyear)?"แก้ไขปีการศึกษา":"เพิ่มปีการศึกษา"}}</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{isset($subjectyear)?route('subjectyear.update',$subjectyear->id):route('subjectyear.store')}}" method="post">
              @csrf
                @if(@isset($subjectyear))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="years">ปีการศึกษา</label>
                    <input type="text" name="years" value="{{isset($subjectyear)?$subjectyear->years:''}}" class="form-control">
                </div>
                @for ($i = 1; $i <= 6; $i++)
                <div class="form-group">
                    <label for="p{{ $i }}">เกณฑ์เกรดเฉลี่ยนต่ำสุด ประถม {{ $i }}</label>  <?php $pAll = 'p'.$i ?>
                    <input type="text" name="p{{ $i }}" value="{{isset($subjectyear)?$subjectyear->$pAll:''}}" class="form-control">
                </div>
                @endfor

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
    @endsection
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    @endsection
