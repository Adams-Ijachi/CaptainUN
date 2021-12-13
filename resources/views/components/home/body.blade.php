<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    @env('local')
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @endenv
    @env('production')
        <link rel="stylesheet" href="{{ secure_asset('css/font-awesome.min.css') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('images/favicon.png') }}">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    @endenv


    @livewireStyles
    <style>
        *{
            margin: 0;
            box-sizing: border-box;
            padding: 0;
            border-style: solid;
            border-width: 0;
        }
        a {
          
            text-decoration: none;
            text-transform: none;
        }
        .form-btn{
            color: #000 !important;
            background-color: rgb(59, 113, 181); !important;
        }
        .form-btn:hover{
            color: #fff !important;
            background-color: rgb(59, 113, 181); !important;
        }
        svg path {
            fill: #add8e6 !important;
            stroke: #fff;
            stroke-width: 2px;
        }
        svg a > path {
            fill: red !important;
        }
        svg a > path:hover {
            fill: blue !important;
        }
        a:hover{
            color: black;
            text-decoration: none;
            background-color:rgb(138, 182, 255) ;
        }
        .bg-green-50 {
            background-color: rgba(236,253,245);
        }
        .header{
            height: 50%;
            
        }
        .w-11\/12 {
            width: 91.666667%;
        }
        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .w-11\/12 {
            width: 99%;
        }
        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
        .text-size {
            
            line-height: 1rem;
        }
        .text-white {
           
            color: rgba(255,255,255);
        }
        .p-2 {
            padding: .5rem;
        }
        .bg-blue-500 {
            
            background-color: rgba(59,130,246);
        }
        .rounded-xl {
            border-radius: .75rem;
        }
        .mr-2 {
            margin-right: .5rem;
        }

        @media (min-width: 768px) { 
            .text-size{
              
                line-height: 1.25rem;
            }
            .text-center{
                text-align: right;
            }
            .text-header{
                text-align: right !important;
            }
            .md-w4{
                width: 80%;
            }

            .w-2-6{
                width: 33.333333%;
            }


        }


         /* End of nav */

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .w-64 {
            width: 10rem;
        }
        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .w-1-6 {
            width: 16.666667%;
        }
        .rounded-full {
            border-radius: 9999px;
        }
        .w-16 {
            width: 4rem;
        }
        .inline {
            display: inline;
        }
        img, video {
            max-width: 100%;
            height: auto;
        }
        .text-blue-500 {
            
            color: rgba(59,130,246);
        }
        .font-black {
            font-weight: 900;
        }
        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }
        .text-left {
            text-align: left;
        }
        .w-5-6 {
            width: 83.333333%;
        }
        .mt-1 {
            margin-top: .25rem;
        }

        .hero-head{
            font-size: 2rem;
           
            font-weight: 900;
            text-align: left;
        }       

        .hero_div{
            margin-right: 6px;
            margin-left: 6px;
            
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .hero_div_logo{
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 18rem;
            text-align: center;
            margin: auto;
        }

        img{
            width: 4rem;
            max-width: 100%;
            height: auto;
            margin-right: 1rem;
        }
        .hero_div_logo_text{
            font-size: 2rem;
            font-weight: 900;
        }
        .text-base{
            font-size: 1rem;
            line-height: 1.5rem;
        }
        .font-bold {
            font-weight: 700;
        }
        .text-sm {
            font-size: .875rem;
            line-height: 1.25rem;
        }
        .text-xs {
            font-size: .75rem;
            line-height: 1rem;
        }
        .text-gray-700 {
            color: rgba(55,65,81);
        }
        .text-blue-400 {
            
            color: rgba(96,165,250);
        }
        .bg-blue-200 {
            
            background-color: rgba(191,219,254);
        }
    
        button {
            cursor: pointer;
        }
        .h-10{
            height: 2.5rem;
        }
        .h-24 {
            height: 6rem;
        }


        .bdge {
            height: 21px;
            background-color: orange;
            color: #fff;
            font-size: 11px;
            padding: 8px;
            border-radius: 4px;
            line-height: 3px
        }

        .comments {
            text-decoration: underline;
            text-underline-position: under;
            cursor: pointer
        }

        .dot {
            height: 7px;
            width: 7px;
            margin-top: 3px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block
        }

        .hit-voting:hover {
            
            
            
            
            
            color: blue
        }

        .hit-voting {
            cursor: pointer
        }


        @media (min-width: 1024px){
            .lg-py-16 {
                padding-top: 4rem !important;
                padding-bottom: 4rem !important;
            }
            .lg-w-4-5 {
                width: 75% !important;
            }
            .lg-flex {
                display: flex;
            }
            .lg-w-4-5{
                width: 80%;
            }
            /* .md\:w-11\/12 {
                width: 91.666667%;
            } */

            .form_con{
                margin-left: 20px !important;

            }

            .form_head_con{
                width: 60% !important
            }
            .svg_con{
                width: 90% !important;margin: auto;
            }

        }


        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
           
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

     
    </style>
    <title>
        {{ $title }}
    </title>
</head>
<body>


    <div>
        <x-home.nav />

        {{ $content}}
    </div>
    <script src="{{ asset('plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    @livewireScripts

</body>
</html>