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
        <strong>{{isset($subject)?"Edit Category":"Create Category"}}</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{isset($subject)?route('subject.update',['id' => $id,'subject'=> $subject->id]):route('subject.store', ['id' => $id,'studentyear'=> $studentyear])}}" method="post">
              @csrf
                @if(@isset($subject))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="years">ชื่อวิชา</label>
                    <input type="text" name="name" value="{{isset($subject)?$subject->name:''}}" class="form-control" required autocomplete="name">
                </div>
                <!-- <div class="form-group">
                        <label for="title">ขั้นตอนการประเมิน</label>
                              <select class="form-control standardSelect" data-placeholder="กรุณาเลือกเทอม" name="type">
                                  @if(empty($subject))
                                    <option value=""></option>
                                  @endif
                                      @for ($i = 1; $i <= 2; $i++) <?php if($i == 1){ $x = 'score';}else{ $x = 'criteria'; } ?>

                                          <option value="{{ $x }}"
                                            @if(isset($subject))
                                              @if($subject->type == $x)
                                                selected
                                              @endif
                                          @endif
                                      > @if($i == 1) คะแนน @else เกณฑ์ @endif </option>
                                  @endfor
                              </select>
                  </div> -->
                  <!-- <div class="form-group">
                      <label for="years">หน่วยกิต</label>
                      <input type="text" name="credit" value="{{isset($subject)?$subject->credit:''}}" class="form-control" required autocomplete="credit">
                  </div> -->


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
