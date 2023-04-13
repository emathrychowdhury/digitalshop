@php
$sliders = App\Models\slider::orderBy('slider_title','ASC')->get();
@endphp
<div class="wrap-main-slide">
    <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
        @foreach($sliders as $slider)
        <div class="item-slide">
            <img src="/storage/{{($slider->slider_image)}}">
            <div class="slide-info slide-1">
                <h2 class="f-title">{{$slider->slider_title}}</b></h2>
                <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                <a href="#" class="btn-link">Shop Now</a>
            </div>
        </div>

        @endforeach
    </div>
</div>
