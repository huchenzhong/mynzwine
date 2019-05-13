@extends('home.layout')


@section('content')
<!-- slider starts -->
<div class="container container-slider">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="/home/static/images/slide1.png" alt="" style="width:100%; height: 330px">
            </div>
            <div class="item">
                <img src="/home/static/images/slide2.jpg" alt="" style="width:100%; height: 330px">
            </div>
            <div class="item">
                <img src="/home/static/images/slide3.jpg" alt="" style="width:100%; height: 330px">
            </div>
        </div>

        <!--control arrow-->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- slider-ends -->

<!--winery introduction-->
<div class="padding">
    <div class="container-wineryheader">
        <h1>Wineries</h1>
    </div>
    <div class="container">
        <!--first one-->
        @foreach($winery_data as $winery)
            <div class="row row-content">
                <div class="col-sm-6">
                    <img src="{{$winery->image}}" height="350px">
                </div>
                <div class="col-sm-6 text-center">
                    <h2>{{$winery->name}}</h2>
                    <p class="lead">
                        {{$winery->desc}}
                    </p>
                    <a href="/wine/winery-wine/{{$winery->id}}" class="btn btn-info btn-block" role="link">Wine of this winery</a>
                </div>
            </div>
        @endforeach

    <!--winery end-->

    <!--partner start-->
    <div class="container">
        <div class="container-wineryheader" style="margin-bottom: 20px">
            <h1>Our Partners</h1>
        </div>
        <section class="customer-logos slider">
            <div class="slide"><img
                        src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
            <div class="slide"><img
                        src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg">
            </div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg">
            </div>
            <div class="slide"><img
                        src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
            <div class="slide"><img
                        src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg"></div>
        </section>
    </div>

    <script>
        $(document).ready(function () {
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
</div>
<!--partner end-->
@endsection

