 <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cancionero | Tuya es nuestra alabanza</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

        <!-- Template js -->
        <script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.appear.js')}}"></script>
        <script src="{{asset('js/contact_me.js')}}"></script>
        <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('js/modernizr.custom.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script>

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
         <div class="section-modal fade" id="service-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="section-modal">
                <a href="{{route('alfabetico')}}">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                </a>

                <div class="container">
                    <div class="row">
                        <div class="section-title text-center">
                            <h3>{{$song->titulo}}</h3>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <div class="text-center">
                        <div class="media-body">
                            <p>
                                {!!$song->cuerpo!!}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </body>

