@extends('home.layouts.app')

@section('title', '首页')

@section('class', 'index clearfix')

@section('body')
    <div class="index-bigpic swiper-container clearfix">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="#"><img src="{{ asset('/style/home/images/bigpic1.jpg') }}"/></a>
            </div>
            <div class="swiper-slide">
                <a href="#"><img src="{{ asset('/style/home/images/bigpic2.jpg') }}"/></a>
            </div>
            <div class="swiper-slide">
                <a href="#"><img src="{{ asset('/style/home/images/bigpic3.jpg') }}"/></a>
            </div>
            <div class="swiper-slide">
                <a href="#"><img src="{{ asset('/style/home/images/bigpic4.jpg') }}"/></a>
            </div>
        </div>
        <!-- 分页器 -->
        <div class="index-bigpic swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <div class="month-has clearfix">
        <h1>本月主推</h1>
        <div class="month-con">
            @foreach($recommend_commodity as $recommend)
                <a href="{{ route('home.commodity_view', ['id' => $recommend['id']]) }}">
                    <img src="{{ $recommend['image_0'] }}"/>
                    <span>{{ $recommend['name'] }}</span>
                    <em>￥{{ $recommend['price'] }}</em>
                </a>
            @endforeach
        </div>
    </div>
    <div class="new clearfix">
        <h1>新品上市</h1>
        <ul class="new-con clearfix">
            @foreach($new_commodity as $item)
                <li>
                    <strong>
                        <img src="{{ $item['image_0'] }}"/>
                        <b><a href="{{ route('home.commodity_view', ['id' => $item['id']]) }}">查看详情</a></b>
                    </strong>
                    <span>{{ $item['name'] }}</span>
                    <em>{{ $item->category->name }}</em>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="discount clearfix">
        <h1>折扣专区</h1>
        <div class="index-discount swiper-container">
            <div class="swiper-wrapper">
                @foreach($discount_commodity as $value)
                    <div class="swiper-slide">
                        <a href="{{ route('home.commodity_view', ['id' => $value['id']]) }}">
                            <img src="{{ $value['image_0'] }}"/>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    // 大图滚动
    var bigPic = $('.index-bigpic').swiper({
        direction: 'horizontal',
        loop: true,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        speed: 1000,
        grabCursor : true,
        // 分页器
        pagination: '.index-bigpic .swiper-pagination',
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next',
    });
    //折扣专区
    var bigPic = $('.index-discount').swiper({
        pagination: '.index-discount .swiper-pagination',
        loop: true,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflow: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true
        }
    });
    //服饰配饰区
    var swiper = $('.index-accessorize1').swiper({
        pagination: '.index-accessorize1 .swiper-pagination',
        loop: true,
        autoplay: 1000,
        autoplayDisableOnInteraction: false,
        effect: 'flip',
        grabCursor: true
    });
    var swiper = $('.index-accessorize2').swiper({
        pagination: '.index-accessorize2 .swiper-pagination',
        loop: true,
        autoplay: 2000,
        autoplayDisableOnInteraction: false,
        effect: 'flip',
        grabCursor: true
    });
    var swiper = $('.index-accessorize3').swiper({
        pagination: '.index-accessorize3 .swiper-pagination',
        loop: true,
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        effect: 'flip',
        grabCursor: true
    });
</script>
@endsection