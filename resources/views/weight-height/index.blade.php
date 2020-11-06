@extends('layouts.src')
@section('content')

@if(auth()->user()->isA())
    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">
                          <div class="d-flex justify-content-end mb-2">
                            <a href="{{route('wh.create')}}" class="btn btn-success ">เพิ่ม</a>
                        </div>
                      </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endif

    <div class="content mt-3">
            <div class="animated fadeIn">

              @if(Session()->has('success'))          <!-- Session มีค่า success  -->
                              <div class="alert alert-success">
                                    {{Session()->get('success')}} <!-- แสดงค่า success ของ Session  -->
                              </div>
                          @endif
                          @if(Session()->has('error'))
                              <div class="alert alert-danger">
                                    {{Session()->get('error')}}
                              </div>
                          @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">ตารางเวลาบันทึกน้ำหนักส่วนสูง</strong>
                            </div>
                            <div class="card-body">
                                @if($whyears->count()>0)
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>ปีการศึกษา</th>
                                      @if(auth()->user()->isA())
                                        <th></th>
                                        <!-- <th></th> -->
                                      @endif
                                      </tr>
                                    </thead>
                                    <tbody>
                                              @foreach($whyears as $whyear) <!-- $Categort คือ sql จาก web.php  -->
                                              <tr>
                                                    <td><a href="{{route('wh.show',$whyear->id)}}">{{$whyear->date}}</a></td>

                                                @if(auth()->user()->isA())
                                                      <td>
                                                          <form class="edit_form" action="{{route('wh.edit',$whyear->id)}}" >
                                                              @csrf
                                                              <input type="hidden" name="_method" value="EDIT">
                                                              <input type="submit" name="" value="Edit" class="btn btn-info btn-sm">
                                                          </form>
                                                      </td>
                                                      <!-- <td>
                                                          <form class="delete_form" action="{{route('wh.destroy',$whyear->id)}}" method="post">
                                                              @csrf
                                                              <input type="hidden" name="_method" value="DELETE">
                                                              <input type="submit" name="" value="Delete" class="btn btn-danger btn-sm">
                                                          </form>
                                                      </td> -->
                                                  @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                    @else
                                    <h3 class="text text-content">ยังไม่มีข้อมูล</h3>
                                  @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    @endsection


        @section('js')
        <script src="{{asset('src/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('src/vendors/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{asset('src/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('src/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('src/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('src/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>


        @endsection

        @section('css')

        <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('src/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">


        @endsection
