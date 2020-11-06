<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html  class="no-js"  lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="apple-touch-icon" href="apple-icon.png"> -->
    <link rel="shortcut icon" href="{{asset('src/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('src/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" href="{{asset('src/vendors/chosen/chosen.min.css')}}">

    @yield('css')

    <link rel="stylesheet" href="{{asset('src/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li class="active">
                        <a href="{{route('admin')}}"> <i class="menu-icon fa fa-dashboard"></i>หน้าหลัก </a>
                    </li> -->

                    <!-- <h3 class="menu-title">UI elements</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li> -->

                    <h3 class="menu-title"></h3>
                    <li  {{ Route::currentRouteName() == 'admin' ? 'class=active' : '' }}>
                        <a href="{{route('welcome')}}"> <i class="menu-icon ti-home"></i>กลับไปยังหน้าแรก</a>
                    </li>

                    @if(auth()->user()->isA())
                    <h3 class="menu-title">บุคลากร</h3><!-- /.menu-title -->
                    <li  >
                        <a href="{{route('personnel.index')}}"> <i class="menu-icon ti-user"></i>จัดการบุคลากร</a>
                    </li>
                    @endif

                    <h3 class="menu-title">นักเรียน</h3><!-- /.menu-title -->
                  @if(auth()->user()->isA())
                    <li {{ (Route::currentRouteName() == 'category.index') || (Route::currentRouteName() == 'category.create') || (Route::currentRouteName() == 'category.edit') ? 'class=active' : '' }} >
                        <a href="{{route('subjectyear.index')}}"> <i class="menu-icon fa fa-book"></i>การจัดการปีการศึกษา</a>
                    </li>
                  @endif
                    <li  >
                        <a href="{{route('student.index')}}"> <i class="menu-icon fa fa-graduation-cap"></i>
                          @if(auth()->user()->isA())
                            จัดการข้อมูลนักเรียน
                          @else
                            ข้อมูลนักเรียน
                          @endif
                          </a>
                    </li>
                    <li  >
                        <a href="{{route('wh.index')}}"> <i class="menu-icon fa fa-balance-scale"></i>จัดการข้อมูลน้ำหนักส่วนสูง</a>
                    </li>



                    @if(auth()->user()->isA())
                    <h3 class="menu-title">ทั่วไป</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown
                    {{
                      (Route::currentRouteName() == 'category.index') || (Route::currentRouteName() == 'category.create') || (Route::currentRouteName() == 'category.edit') ||
                      (Route::currentRouteName() == 'tags.index') || (Route::currentRouteName() == 'tags.create') || (Route::currentRouteName() == 'tags.edit') ||
                      (Route::currentRouteName() == 'posts.index') || (Route::currentRouteName() == 'posts.create') || (Route::currentRouteName() == 'posts.edit')  ? 'active' : '' }}  ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > <i class="menu-icon fa fa-archive"></i>จัดการบทความ</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-bars"></i><a href="{{route('category.index')}}">จัดการหัวข้อบทความ</a></li>
                            <li><i class="menu-icon ti-comment-alt"></i><a href="{{route('posts.index')}}">จัดการเนื้อหาบทความ</a></li>
                            <li><i class="menu-icon fa fa-tag"></i><a href="{{route('tags.index')}}">จัดการแท็ก</a></li>
                        </ul>
                    </li>
                    <!-- <li {{ (Route::currentRouteName() == 'category.index') || (Route::currentRouteName() == 'category.create') || (Route::currentRouteName() == 'category.edit') ? 'class=active' : '' }} >
                        <a href="{{route('category.index')}}"> <i class="menu-icon ti-email"></i>จัดการหัวข้อบทความ</a>
                    </li>
                    <li {{ Route::currentRouteName() == 'posts.index' ? 'class=active' : '' }}>
                        <a href="{{route('posts.index')}}"> <i class="menu-icon ti-email"></i>จัดการบทความ</a>
                    </li>
                    <li {{ (Route::currentRouteName() == 'tags.index') || (Route::currentRouteName() == 'tags.create') || (Route::currentRouteName() == 'tags.edit') ? 'class=active' : '' }}>
                        <a href="{{route('tags.index')}}"> <i class="menu-icon ti-email"></i>จัดการ Tag</a>
                    </li> -->
                    <li {{ (Route::currentRouteName() == 'files.index') || (Route::currentRouteName() == 'files.create') || (Route::currentRouteName() == 'files.edit') ? 'class=active' : '' }}>
                        <a href="{{route('files.index')}}"> <i class="menu-icon fa fa-file-text"></i>จัดการไฟล์เอกสาร</a>
                    </li>
                    <li {{ (Route::currentRouteName() == 'album.index') || (Route::currentRouteName() == 'album.create') || (Route::currentRouteName() == 'album.edit') ? 'class=active' : '' }} >
                        <a href="{{route('album.index')}}"> <i class="menu-icon fa fa-camera"></i>จัดการอัลบั้ม</a>
                    </li>
                    @endif





                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
                <div class="col-sm-12">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->titlename }}{{ Auth::user()->firstname}}&nbsp;{{ Auth::user()->lastname}}                        <?php if(Auth::user()->type == 'admin' ){
                                                                                                                                                          echo "(ผู้ดูแลระบบ)";
                                                                                                                                                        }else{
                                                                                                                                                            echo "(ครู)";
                                                                                                                                                        }?>
                        </a>

                        <div class="user-menu dropdown-menu">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              <i class="fa fa-power-off"></i> {{ __('ออกจากระบบ') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->


@yield('content')



        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{asset('src/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('src/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('src/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('src/assets/js/main.js')}}"></script>

    <script src="{{asset('src/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('src/vendors/jquery-validation-unobtrusive/src/jquery.validate.unobtrusive.js')}}"></script>

    @yield('js')

    <script src="{{asset('src/vendors/chosen/chosen.jquery.min.js')}}"></script>
    <!-- <script src="{{asset('src/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('src/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('src/assets/js/widgets.js')}}"></script>
    <script src="{{asset('src/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('src/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('src/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script> -->

</body>
    @yield('script')
</html>
