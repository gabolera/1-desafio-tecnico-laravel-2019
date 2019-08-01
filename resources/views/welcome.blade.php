@extends('layouts.app')
@section('content')

        <style>
            html, body {
                background-color: #fff;
                color: #212121;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 50vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Bludata Challenge
                </div>

                <div class="links">
                    <a href="https://github.com/dshy1/Laravel-Challenge">GitHub Project</a>
                    <a href="#">Gabriel Andreazza</a>
                </div>
            </div>
        </div>
        <div class="container">
                <div class="row">
                    <div class="col-12">
                    <a href="{{route('empresa.index')}}" class="btn btn-success btn-block btn-lg">START APP</a>
                    </div>
                </div>
            </div>
@endsection