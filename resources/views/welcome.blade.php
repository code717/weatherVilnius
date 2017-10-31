<!DOCTYPE html>
<html>
    <head>
        <title>Weather in Vilnius</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Tenor+Sans' rel='stylesheet' type='text/css'>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Tenor Sans';
                background-image:url('../images/vilnius.jpg'), url('images/vilnius.jpg');
                background-size: cover;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
                background-color: rgba(0,0,0, 0.6);
                color:white;
            }
            
            .content a{
                color:white;
            }

            .title {
                font-size: 46px;
            }
            
            .navbar-nav li{
                display:inline;
                padding:5px;
                border-right:1px solid white;
                border-left:1px solid white;
            }
            
            .navbar-nav li:hover{
               background-color: blue;
            }
            
            .navbar-nav li a{
                text-decoration:none;
                color:white;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default" style="background-color:rgba(255,0,0,0.5); color:white; font-size:25px;">
  <div class="container-fluid" style="background-color:rgba(255,0,0,0.5);">
    
    <ul class="nav navbar-nav">
      <li class="active">{!! link_to_route('temperature', 'Yahoo', ['provider' => 'yahoo']) !!}</li>
      <li>{!! link_to_route('temperature', 'OpenWeather', ['provider' => 'openWeather']) !!}</li>
      
    </ul>
  </div>
</nav>
            <div class="content">
                <!--<div class="text-center">@if(isset($imgUrl)) {{$imgUrl}}>@endif</div>-->
                <div class="title">Šiuo metu temperatūra Vilniuje yra @if(isset($temp)){{$temp}}&#8451;  @endif</div>
                <div>Duomenis iš {{ Html::link($link, $title, array('target'=>'_blank')) }}</div>
            </div>
        </div>
    </body>
</html>
