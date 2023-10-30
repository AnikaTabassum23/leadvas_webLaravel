<!DOCTYPE html>
<html class=no-js>
    <head>
        <meta charset=utf-8>
        <title>{{$title}}</title>
        <!-- Mobile specific metas -->
        <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1">
        <!-- Force IE9 to render in normal mode --><!--[if IE]>
        <meta http-equiv="x-ua-compatible" content="IE=9" />
        <![endif]-->
        <!-- Fav and touch icons -->
        <link rel="icon" href="{{ url('public/web/img/favicon.ico') }}" type="image/png">
        <!-- Import google fonts - Heading first/ text second -->
        <link type="text/css" rel="stylesheet" href="{!! asset('public/css/googleapis_droid_sans.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('public/css/googleapis_open_sans.css') !!}" />
        <!-- Css files -->
        <link type="text/css" rel="stylesheet" href="{!! asset('public/plugins/validation/css/formValidation.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('public/css/bootstrap-select.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('public/css/main.min.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('public/css/custom.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('public/plugins/fullcalendar/fullcalendar.css') !!}" />
        <!-- Bootstrap DatePicker -->
        <link type="text/css" rel="stylesheet" href="{!! asset('public/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') !!}" />
        <!--Summer Note-->
        <link type="text/css" rel="stylesheet" href="{!! asset('public/plugins/summernote/summernote.css') !!}" />
        <!--Treed Tree-->
        <link type="text/css" rel="stylesheet" href="{!! asset('public/plugins/treed/css/build.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('public/plugins/treed/css/index.css') !!}" />
        <link type="text/css" rel="stylesheet" href="{!! asset('public/css/slider.css') !!}" />
        <!--Percentage Loader-->
        <link type="text/css" rel="stylesheet" href="{!! asset('public/plugins/percentageLoader/jquery.percentageloader-0.1.css') !!}" />
        <!--Image Viewer-->
        <link type="text/css" rel="stylesheet" href="{!! asset('public/plugins/imageviewer/imageviewer.css') !!}" />
        <!--Data Table-->
        <link rel="stylesheet" type="text/css" href="{!! asset('public/plugins/dataTable/css/buttons.dataTables.min.css') !!}">

        <!--image crope-->
         <!--  <link rel="stylesheet" type="text/css" href="{!! asset('public/global_plugin/croppee/css/croppie.css') !!}"> -->


    </head>
    <body>
        <audio id="notifySound" width="0" height="0"><source src="{{url('public/audio/maramba.mp3')}}" type="audio/mp3"></audio>
        <!--[if lt IE 9]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--><!-- .#header -->
        <div id=header>
            <nav class="navbar navbar-default" role=navigation>
                <?php 
                    $poject_logo = (!empty($projectInfo->logo)) ? $projectInfo->logo : 'default.png';
                ?>
                <div class="navbar-header"><a class="navbar-brand" href="{{url($prefix)}}" style="margin-right: 0;"><img src="{{asset('public/uploads/logo/'.$poject_logo)}}" style="display: inline" height="35"></a></div>
                <div id="navbar-no-collapse" class="navbar-no-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <!--Sidebar collapse button--><a href=# class="collapseBtn leftbar"><i class="s16 minia-icon-list-3"></i></a>
                        </li>
                        <li><a href=# class="tipB reset-layout" title="Reload page"><i class="s16 icomoon-icon-history"></i></a></li>
                    </ul>
                    <ul class="nav navbar-right usernav">
                        <li>
                            <div class="note-fontname btn-group">
                                <button tabindex="-1" title="" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" data-original-title="Font Family" aria-expanded="false" style="height:36px; background-image:linear-gradient(to bottom, #fafafa 0px, #dcdcdc 100%);">
                                    <i class="s16 {{$module->module_icon}}"></i>
                                    <span class="note-current-fontname">{{$module->sort_name}}</span>
                                    @if($module_number>1)
                                    <span class="caret"></span>
                                    @endif
                                </button>
                                @if($module_number>1)
                                <ul class="dropdown-menu">
                                    @foreach($modules as $modules)
                                      <li @if($modules->id==$module->id) class="active" @endif>
                                        <a  @if($modules->id==$module->id) href="#" @else href="{{url($modules->url_prefix)}}@endif" data-event="fontName">
                                        <i class="{{$modules->module_icon}}"></i>{{$modules->module_name}}</a>
                                      </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </li>
                        <li class=dropdown>
                            <a href=# class="dropdown-toggle avatar" data-toggle=dropdown>
                                    @if(!empty($userImage->image))
                                        <img src="{{url('public/uploads/provider_user_images/'.$userImage->image)}}" alt="Profile Image" class="image">
                                    @else
                                        <img src="{{url('public/img/avatar.jpg')}}" alt="Profile Image" class="image">
                                    @endif
                                <span class=txt>{{Auth::guard('provider')->user()->name}}</span> <b class=caret></b>
                            </a>
                            <ul class="dropdown-menu right" style="183px !important;">
                                <li class="menu" style="width:175px">
                                    <ul>
                                        <li><a href="user-profile" title="Profile Edit" class="ajax-link"><i class="s16 icomoon-icon-user"></i>Profile Edit</a></li>
                                        <li><a href={{route('provider.logout')}}><i class="s16 icomoon-icon-exit"></i><span class=txt>Logout</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href={{route('provider.logout')}}><i class="s16 icomoon-icon-exit"></i><span class=txt>Logout</span></a></li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
            <!-- /navbar -->
        </div>
        <!-- / #header -->
        <div id=wrapper>
            <!-- #wrapper --><!--Sidebar background-->
            <div id=sidebarbg class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
            <!--Sidebar content-->
            <div id=sidebar class="page-sidebar hidden-lg hidden-md hidden-sm hidden-xs">
                <div class=shortcuts>
                    <ul>
                        <li><a href=# title="Database backup" class=tip><i class="s24 icomoon-icon-database"></i></a></li>
                        <li><a href=# title="Sales statistics" class=tip><i class="s24 icomoon-icon-pie-2"></i></a></li>
                        <li><a href=# title="Suggestion" class=tip><i class="s24 icomoon-icon-pencil"></i></a></li>
                        <li><a href='user-Guide' title="User Guide" class="ajax-link tip"><i class="s24 icomoon-icon-support"></i></a></li>
                    </ul>
                </div>
                <!-- End search --><!-- Start .sidebar-inner -->
                <div class=sidebar-inner>
                    <!-- Start .sidebar-scrollarea -->
                    <div class=sidebar-scrollarea>
                        <div class=sidenav>
                            <div class="sidebar-widget mb0">
                                <h6 class="title mb0">Navigation</h6>
                            </div>
                            <!-- End .sidenav-widget -->
                            <div class=mainnav>
                                <ul>
                                    <?php
                                    $parent_ids = $software_menus->pluck('parent_id');
                                    $menu_list_1 = $parent_ids->filter(function($item) { return $item==0; })->all();
                                    
                                    ?>
                                    @foreach($menu_list_1 as $menu_key_1=>$val)
                                        <?php
                                        $menu_1 = $software_menus[$menu_key_1];
                                        $menu_list_2 = $parent_ids->filter(function($item) use ($menu_1) { return $item==$menu_1->id; })->all();
                                        ?>
                                        <li>
                                            <?php
                                                $route = explode(".", $menu_1->route);
                                                $link = ($route[count($route)-1]=='#')?'#':route($menu_1->route);
                                                if($link!='#') { $link = explode(url($prefix).'/', $link); $link = $link[1]; }
                                            ?>
                                            <a @if(!empty($menu_list_2)) href="#" @else href="{{$link}}" class="ajax-link" @endif>
                                                <i class="s16 {{empty($menu_1->menu_icon) ? 'icomoon-icon-arrow-right-3' : $menu_1->menu_icon}}"></i>
                                                <span class="txt">{{$menu_1->menu_name}}</span>
                                                <span class="indicator"></span>
                                                @if($link  == "request-approved" && $req_receive_notification > 0)<span class="notification red" style="right: 10px;">{{$req_receive_notification}}</span>@endif
                                            </a>
                                            @if(!empty($menu_list_2))
                                            <ul class="sub">
                                                @foreach($menu_list_2 as $menu_key_2=>$val)
                                                    <?php
                                                    $menu_2 = $software_menus[$menu_key_2];
                                                    $menu_list_3 = $parent_ids->filter(function($item) use ($menu_2) { return $item==$menu_2->id; })->all();
                                                    ?>
                                                    <li>
                                                        <?php
                                                            $route = explode(".", $menu_2->route);
                                                            $link = ($route[count($route)-1]=='#')?'#':route($menu_2->route);
                                                            if($link!='#') { $link = explode(url($prefix).'/', $link); $link = $link[1]; }
                                                        ?>
                                                        <a @if(!empty($menu_list_3)) href="#" @else href="{{$link}}" class="ajax-link" @endif>
                                                            <i class="s16 {{empty($menu_2->menu_icon) ? 'icomoon-icon-arrow-right-3' : $menu_2->menu_icon}}"></i>
                                                            <span class="txt">{{$menu_2->menu_name}}</span>
                                                            <span class="indicator"></span>
                                                            @if($link  == "requestReceive" && $request_info_receive_notifi > 0)<span class="notification red" style="right: 10px;">{{$request_info_receive_notifi}}</span>@endif
                                                        </a>
                                                        @if(!empty($menu_list_3))
                                                            <ul class="sub">
                                                                @foreach($menu_list_3 as $menu_key_3=>$val)
                                                                    <?php
                                                                    $menu_3 = $software_menus[$menu_key_3];
                                                                    $menu_list_4 = $parent_ids->filter(function($item) use ($menu_3) { return $item==$menu_3->id; })->all();
                                                                    ?>
                                                                    <li>
                                                                        <?php
                                                                            $route = explode(".", $menu_3->route);
                                                                            $link = ($route[count($route)-1]=='#')?'#':route($menu_3->route);
                                                                            if($link!='#') { $link = explode(url($prefix).'/', $link); $link = $link[1]; }
                                                                        ?>
                                                                        <a @if(!empty($menu_list_4)) href="#" @else href="{{$link}}" class="ajax-link" @endif>
                                                                            <i class="s16 {{empty($menu_3->menu_icon) ? 'icomoon-icon-arrow-right-3' : $menu_3->menu_icon}}"></i>
                                                                            <span class="txt">{{$menu_3->menu_name}}</span>
                                                                            <span class="indicator"></span>                                                                         
                                                                        </a>
                                                                        @if(!empty($menu_list_4))
                                                                            <ul class="sub">
                                                                                @foreach($menu_list_4 as $menu_key_4=>$val)
                                                                                    <?php
                                                                                    $menu_4 = $software_menus[$menu_key_4];
                                                                                    $menu_list_5 = $parent_ids->filter(function($item) use ($menu_4) { return $item==$menu_4->id; })->all();
                                                                                    ?>
                                                                                    <li>
                                                                                        <?php
                                                                                            $route = explode(".", $menu_4->route);
                                                                                            $link = ($route[count($route)-1]=='#')?'#':route($menu_4->route);
                                                                                            if($link!='#') { $link = explode(url($prefix).'/', $link); $link = $link[1]; }
                                                                                        ?>
                                                                                        <a @if(!empty($menu_list_5)) href="#" @else href="{{$link}}" class="ajax-link" @endif>
                                                                                            <i class="s16 {{empty($menu_4->menu_icon) ? 'icomoon-icon-arrow-right-3' : $menu_4->menu_icon}}"></i>
                                                                                            <span class="txt">{{$menu_4->menu_name}}</span>
                                                                                            <span class="indicator"></span>
                                                                                        </a>
                                                                                        @if(!empty($menu_list_5))
                                                                                            <ul class="sub">
                                                                                                @foreach($menu_list_5 as $menu_key_5=>$val)
                                                                                                    <?php
                                                                                                    $menu_5 = $software_menus[$menu_key_5];
                                                                                                    ?>
                                                                                                    <li>
                                                                                                        <?php
                                                                                                            $route = explode(".", $menu_5->route);
                                                                                                            $link = ($route[count($route)-1]=='#')?'#':route($menu_5->route);
                                                                                                            if($link!='#') { $link = explode(url($prefix).'/', $link); $link = $link[1]; }
                                                                                                        ?>
                                                                                                        <a href="{{$link}}" class="ajax-link">
                                                                                                            <i class="s16 {{empty($menu_5->menu_icon) ? 'icomoon-icon-arrow-right-3' : $menu_5->menu_icon}}"></i>
                                                                                                            <span class="txt">{{$menu_5->menu_name}}</span>
                                                                                                            <span class="indicator"></span>
                                                                                                        </a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @endif
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End .sidenav-widget -->
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </div>
            <div id="content" class="page-content clearfix">
                <div class=contentwrapper>
                    <div class="heading">
                        <h3></h3>
                        <ul class="breadcrumb">
                            <li>You are here:</li>
                        </ul>
                    </div>
                    <div id="ajax-content" @if(!empty($attr)) @foreach($attr as $atKey=>$atValue) {{' '.$atKey.'='.$atValue}} @endforeach @endif>
                        <!-- content will load here -->
                    </div>
                </div>
            </div>
            <!-- End #content -->
            <div id=footer class="clearfix sidebar-page right-sidebar-page">
                <!-- Start #footer  -->
                <p class=pull-left>Copyrights &copy; {{date('Y')}} <a href="http://iisbd.com" class="color-blue strong" target=_blank> INNOVATION</a>. All rights reserved.</p>
                <p class="pull-right"><a href="termsOfUse" class="mr5 ajax-link">Terms of use</a> | <a href="privacyPolicy" class="ml5 mr25 ajax-link">Privacy policy</a></p>
            </div>
            <!-- End #footer  -->
        </div>
        <!-- / #wrapper --><!-- Back to top -->
        <div id=back-to-top><a href=#>Back to Top</a></div>

        <!-- Javascripts --><!-- Load pace first -->
        <!--<script data-pace-options='{ "ajax": false }' src="{!! asset('public/plugins/core/pace/pace.min.js') !!}"></script>-->
        <script src="{{url($prefix.'/javascript')}}"></script>
        <!-- Important javascript libs(put in all pages) -->
        <script src="{!! asset('public/js/libs/jquery-2.1.1.min.js') !!}"></script>
        <script src="{!! asset('public/js/main_2.5.js') !!}"></script>
        <script src="{!! asset('public/js/libs/jquery-ui-1.10.4.min.js') !!}"></script>
        <script src="{!! asset('public/js/libs/jquery-migrate-1.2.1.min.js') !!}"></script>
        <!--Chart JS-->
        <script src="{!! asset('public/js/chartjs/Chart.bundle.min.js') !!}"></script>
        <!-- Bootstrap DatePicker -->
        <script type="text/javascript" src="{!! asset('public/plugins/bootstrap-datetimepicker/moment-with-locales.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('public/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') !!}"></script>
        <!-- Important javascript (App js) -->
        <!-- Ajax Upload -->
        <script type="text/javascript" src="{!! asset('public/js/ajaxupload.3.5.js') !!}"></script>
        <!-- Important javascript (App js-calendar) -->
        <script type="text/javascript" src="{!! asset('public/plugins/fullcalendar/fullcalendar.js') !!}"></script>
        <!-- Important javascript (App js) -->
        <script src="{!! asset('public/plugins/validation/js/formValidation.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('public/plugins/validation/js/framework/bootstrap.js') !!}"></script>
        <script src="{!! asset('public/js/bootstrap/bootstrap-select.min.js') !!}"></script>
        

        <!-- Data Table -->
        <script type="text/javascript" language="javascript" src="{!! asset('public/plugins/dataTable/js/jquery.dataTables.min.js') !!}"></script>
        <script type="text/javascript" language="javascript" src="{!! asset('public/plugins/dataTable/js/dataTables.buttons.min.js') !!}">
        </script>
        <script type="text/javascript" language="javascript" src="{!! asset('public/plugins/dataTable/js/buttons.flash.min.js') !!}">
        </script>
        <script type="text/javascript" language="javascript" src="{!! asset('public/plugins/dataTable/js/jszip.min.js') !!}">
        </script>
        <script type="text/javascript" language="javascript" src="{!! asset('public/plugins/dataTable/js/pdfmake.min.js') !!}">
        </script>
        <script type="text/javascript" language="javascript" src="{!! asset('public/plugins/dataTable/js/vfs_fonts.js') !!}">
        </script>
        <script type="text/javascript" language="javascript" src="{!! asset('public/plugins/dataTable/js/buttons.html5.min.js') !!}">
        </script>
        <script type="text/javascript" language="javascript" src="{!! asset('public/plugins/dataTable/js/buttons.print.min.js') !!}">
        </script>

        <!--Frame-->
        <script src="{!! asset('public/js/frame_2.4.js') !!}"></script>
        <script src="{!! asset('public/js/custom_2.5.js') !!}"></script>
        <!--Summer Note-->
        <script src="{!! asset('public/plugins/summernote/summernote.min.js') !!}"></script>
        <!--Treed Tree-->
        <script src="{!! asset('public/plugins/treed/js/d3.js') !!}"></script>
        <script src="{!! asset('public/plugins/treed/js/demo-bundle.js') !!}"></script>
        <script src="{!! asset('public/plugins/treed/js/flare-tree.js') !!}"></script>
        <script src="{!! asset('public/plugins/treed/js/marked.js') !!}"></script>
        <script src="{!! asset('public/plugins/treed/js/setup.js') !!}"></script>
        <script src="{!! asset('public/js/bootstrap-slider.js') !!}"></script>

        <!--Percentage Loader-->
        <script src="{!! asset('public/plugins/percentageLoader/jquery.percentageloader-0.1.js') !!}"></script>
        <!--Image Viewer-->
        <script src="{!! asset('public/plugins/imageviewer/imageviewer.min.js') !!}"></script>

        <script src="{!! asset('public/js/hideShowPassword.min.js') !!}"></script>

        <!--image crope-->
        <script src="{!! asset('public/global_plugin/croppee/js/jquery.cropit.js') !!}"></script>



        <script type="text/javascript">
            $(document).ready(function() {
                $(".fancy-select").fancySelect({
                    placeholder: "Select"
                });
            });
        </script>
    </body>
</html>


