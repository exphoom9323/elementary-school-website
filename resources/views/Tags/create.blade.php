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
              <strong>{{isset($tag)?"Edit Tags":"Create Tags"}}</strong>
          </div>
          <div class="card-body card-block">
            <form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}" method="post"> <!-- method="post" ต้อง @csft-->
              @csrf
                @if(@isset($tag))
                    @method('PUT')
                @endif
                  <div class="form-group">
                    <label class="form-control-label">ชื่อ Tag</label>
                    <input type="text" name="name" value="{{isset($tag)?$tag->name:''}}" class="form-control" required autocomplete="name">
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
