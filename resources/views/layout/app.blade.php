<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <!-- Bootstrap Core CSS -->
        
        <link href="assets/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="assets/css/metisMenu.min.css" rel="stylesheet">
        
        <!-- Timeline CSS -->
                <!-- Custom CSS -->
        <link href="assets/css/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="assets/css/morris.css" rel="stylesheet">
        <link href="assets/css/main.css">
        <!-- Custom Fonts -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
        
        <style>
            .loadingBar {
            width: 48px;
            height: 48px;
            border: 5px solid black;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: flex;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
            
            }

            @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
            } 
        </style>
        
</head>


<body>
<!-- <div 
    class="loadingScreen"  
    id="loadingScreen"
    style="display:flex; justify-content: center; align-items: center; width:100%; height:100%; position:fixed; z-index:9999; background:rgba(255, 255, 255, 0.8);"
        >
        <span class="loadingBar"></span>
</div> -->
<div id="wrapper">



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="">CRUD</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">qqq</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                
                
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/" class=""><i class="fa fa-arrow-left fa-fw"></i> Input</a>
                    </li>
                    <li>
                        <a href="/output" class=""><i class="fa fa-arrow-right fa-fw"></i> Output</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
<div id="page-wrapper">
                <div class="container-fluid" style="margin-bottom:10px">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"> @yield('menuTitle') </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    
                    <!-- /.row -->
                    
                        @yield('content')
                            <!-- Children here -->
                        
                    
                    
                                <!-- /.panel-footer -->
                            </div>
                            <!-- /.panel .chat-panel -->
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>

        

        

    <!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    
    
        
    
    

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script type="text/javascript" src="assets/js/metisMenu.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <!-- Morris Charts JavaScript -->
        <script type="text/javascript" src="assets/js/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="assets/js/bootstrap-datepicker.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="assets/js/startmin.js"></script>
        <script type="text/javascript" src="app/core.js"> </script>
@yield('extjs')
</body>
</html>