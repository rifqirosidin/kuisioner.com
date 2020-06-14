@push('css_after')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">

    <style>
        .testimonial{
            text-align: center;
            padding: 0 20px;
        }
        .testimonial .icon{
            font-size: 60px;
            line-height: normal;
            color: #1ec4f3;
        }
        .testimonial .description{
            font-size: 16px;
            font-style: italic;
            color: #777;
            line-height: 26px;
            margin-top: -20px;
        }
        .testimonial .pic{
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin: 20px auto;
        }
        .testimonial .pic img{
            width: 100%;
            height: auto;
        }
        .testimonial .testimonial-title{
            font-size: 16px;
            font-weight: bold;
            color: #474740;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .testimonial .post{
            display: block;
            font-size: 14px;
            color: #1ec4f3;
        }
        .owl-theme .owl-controls .owl-pagination{
            margin-top: 20px;
        }
        .owl-theme .owl-controls .owl-page span{
            width: 10px;
            height: 10px;
            background: #99bf4b;
            border: 2px solid transparent;
            opacity: 1;
        }
        .owl-theme .owl-controls .owl-page.active span,
        .owl-theme .owl-controls .owl-page span:hover{
            background: #fff;
            border: 2px solid #99bf4b;
        }
    </style>

@endpush
<div class="row bg-gray-light mb-30">
    <div class="col-md-12">
        <div id="testimonial-slider" class="owl-carousel">
{{--            <div class="testimonial">--}}
{{--                <i class="icon">"</i>--}}
{{--                <p class="description">--}}
{{--                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac condimentum mi, vitae iaculis ante. Suspendisse viverra urna quis diam sodales, convallis auctor nibh.--}}
{{--                </p>--}}
{{--                <div class="pic">--}}
{{--                    <img src="images/img-1.jpg" alt="">--}}
{{--                </div>--}}
{{--                <h3 class="testimonial-title">williamson</h3>--}}
{{--                <span class="post">Web Developer</span>--}}
{{--            </div>--}}

            @foreach($testimonies as $testimony)
            <div class="testimonial">
                <i class="icon">"</i>
                <p class="description">
                    {{ $testimony->content }}
                </p>
                <h3 class="testimonial-title">{{ $testimony->name }}</h3>
{{--                <span class="post">Web Designer</span>--}}
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#testimonial-slider").owlCarousel({
                items:1,
                itemsDesktop:[1000,1],
                itemsDesktopSmall:[979,1],
                itemsTablet:[768,1],
                pagination: true,
                slideSpeed:1000,
                transitionStyle:"fadeUp",
                autoPlay:false
            });
        });
    </script>
@endpush
