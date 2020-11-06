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
        <strong>{{isset($post)?"แก้ไขบทความ":"สร้างบทความ"}}</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
              @csrf
                @if(@isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" value="{{isset($post)?$post->title:''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea name="description" rows="2" cols="2" class="form-control">{{isset($post)?$post->description:''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">Content</label>
                    <input id="x" type="hidden" name="content" value="{{isset($post)?$post->content:''}}">
                    <trix-editor input="x"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="title">Image หน้าปก</label>
                    <input type="file" name="image" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Category</label>
                    <select class="form-control standardSelect" data-placeholder="กรุณาเลือกบทความ" name="category_id">
                        @if(empty($post))
                          <option value=""></option>
                        @endif
                        @foreach($category as $category)
                            <option value="{{$category->id}}"
                              @if(isset($post))
                                @if($category->id == $post->category_id)
                                selected
                            @endif
                        @endif
                        >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if($tags->count()>0)

                <div class="form-group">
                    <label for="title">Tag</label>
                    <select class="form-control standardSelect" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"
                              @if(isset($post))
                                @if($post->hasTag($tag->id))
                                  selected
                                @endif
                              @endif
                    >{{$tag->name}}</option><!-- เชกอยู่ใน App\Http\Post hasTag() -->
                        @endforeach
                    </select>
                </div>
              @endif
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
