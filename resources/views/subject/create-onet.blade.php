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
        <strong>{{isset($onet)?"แก้ไขคะแนน O-net":"เพิ่มคะแนน O-net"}}</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{isset($onet)?route('subject.updateOnet',$id):route('subject.storeOnet', $id)}}" method="post">
              @csrf
                @if(@isset($onet))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="years">คะแนน ภาษาไทย ของโรงเรียน</label>
                    <input type="text" name="thai" value="{{isset($onet)?$onet->thai:''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="years">คะแนน ภาษาอังกฤษ ของโรงเรียน</label>
                    <input type="text" name="eng" value="{{isset($onet)?$onet->eng:''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="years">คะแนน คณิตศาสตร์ ของโรงเรียน</label>
                    <input type="text" name="mathematics" value="{{isset($onet)?$onet->mathematics:''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="years">คะแนน วิทยาศาสตร์ ของโรงเรียน</label>
                    <input type="text" name="science" value="{{isset($onet)?$onet->science:''}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="years">คะแนน ภาษาไทย ของประเทศ</label>
                    <input type="text" name="allthai" value="{{isset($onet)?$onet->allthai:''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="years">คะแนน ภาษาอังกฤษ ของประเทศ</label>
                    <input type="text" name="alleng" value="{{isset($onet)?$onet->alleng:''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="years">คะแนน คณิตศาสตร์ ของประเทศ</label>
                    <input type="text" name="allmathematics" value="{{isset($onet)?$onet->allmathematics:''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="years">คะแนน วิทยาศาสตร์ ของประเทศ</label>
                    <input type="text" name="allscience" value="{{isset($onet)?$onet->allscience:''}}" class="form-control">
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
    @endsection
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    @endsection
