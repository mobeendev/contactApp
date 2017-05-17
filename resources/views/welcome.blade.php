@extends('layouts.master')


@section('content')



<!-- content -->
<div class="container">

    <!-- Half Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">

                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/contact1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Sed diam nonumy eirmod tempor invidunt</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/contact3.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Dolore magna aliquyam erat</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/contact.png');"></div>
                <div class="carousel-caption">
                    <h2>Tempor invidunt ut labore et dolore</h2>
                </div>
            </div>


        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>


    <div class="panel panel-default">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Welcome to Contacts App</h1>
                <p class="lead">Amazing app which allows you to create & save your contacts easily!!</p>
                <p class="">  
                    Lets get <a class="btn btn-danger btn-sm" href="">Registered</a> and start.
                </p>

            </div>
        </div>
    </div>


</div>



@endsection
