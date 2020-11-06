@extends('layouts.src')
@section('content')


<div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Multiple Upload</strong>
                        </div>
                        <div class="card-header">
                          <div class="file-loading">
                            <input id="image-file" type="file" name="PostImages" accept="image/*" data-min-file-count="1" multiple>
                          </div>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    @endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" rel="stylesheet" />

@endsection


@section('script')
<script type="text/javascript">
    jQuery(document).ready(function($) {

      $("#image-file").fileinput({
          uploadUrl:"{{route('postimage.store',$id)}}",
          theme:'fa',
          uploadExtraData:function(){
            return{
              _token:"{{csrf_token()}}",
            }
          },
          allowedFileExtensions:['jpeg','jpg','png'],
          maxFileSize:2048,
          // maxFileCount:2, //จำนวนไฟล์
          browseOnZoneClick: true,
          initialPreviewAsData: true,
      });

    });
</script>
@endsection
