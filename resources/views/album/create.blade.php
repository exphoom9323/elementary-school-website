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

                @if(Session()->has('error'))
                    <div class="alert alert-danger">    <!--  เพิ่ให้อข้อก่อน -->
                          <ul class="list-group">
                            <li class="list-group-item">{{Session()->get('error')}}</li>
                          </ul>
                      </div>
                  @endif

      <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <strong>{{isset($album)?"แก้ไข":"สร้างอัลบั้ม"}}</strong>
          </div>
          <div class="card-body card-block">
            <form action="{{isset($album)?route('album.update',$album->id):route('album.store')}}" method="post"> <!-- method="post" ต้อง @csft-->
              @csrf
                @if(@isset($album))
                    @method('PUT')
                @endif
                  <div class="form-group">
                    <label class="form-control-label">ชื่อหัวอัลบั้ม</label>
                    <input type="text" name="name" value="{{isset($album)?$album->name:''}}" class="form-control">
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
