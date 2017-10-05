@extends('home.layouts.app')

@section('title', '首页')
@section('body')
    <div class="index-bigpic swiper-container clearfix">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="personal-custom.html"><img src="images/bigpic1.jpg"/></a>
            </div>
            <div class="swiper-slide">
                <a href="personal-custom.html"><img src="images/bigpic2.jpg"/></a>
            </div>
            <div class="swiper-slide">
                <a href="personal-custom.html"><img src="images/bigpic3.jpg"/></a>
            </div>
            <div class="swiper-slide">
                <a href="personal-custom.html"><img src="images/bigpic4.jpg"/></a>
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
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
            <a href="cn/goods-details.html">
                <img src="images/shoes5.jpg"/>
                <span>xxxxxxx</span>
                <em>￥999.00</em>
            </a>
        </div>
    </div>
    <div class="new clearfix">
        <h1>新品上市</h1>
        <ul class="new-con clearfix">
            @foreach($new_commodity as $item)
                <li>
                    <strong>
                        <img src="{{ $item['image_0'] }}"/>
                        <b><a href="cn/goods-list.html">查看详情</a></b>
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
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-2-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-3-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-2-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-2-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-3-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="accessorize clearfix">
        <h1>服饰配饰区</h1>
        <div class="index-accessorize1 swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-2-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-3-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="index-accessorize2 swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-2-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-3-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="index-accessorize3 swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-2-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-3-0914.jpg"/></a></div>
                <div class="swiper-slide"><a href="cn/goods-details.html"><img src="images/HP-3-1-0914.jpg"/></a></div>
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