<!-- Start Slider Area -->
<section class="categories-slider-area bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 float-left-style">
                <div class="slider__container slider--one">
                <div class="slider__activation__wrap owl-carousel owl-theme">
                    @foreach($sliders as $slider)
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url({{ asset(env('SLIDER_IMG_PATH').$slider->image) }}) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>{{ $slider->title }}  <span class="text--theme">{{ $slider->caption }}</span></h1>
                                            @if($slider->product_id)
                                                <div class="slider__btn">
                                                    <a class="htc__btn" href="{{ getProductUrl($slider->product_id) }}">shop now</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
    <!-- End Slider Area -->
