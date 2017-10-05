@extends('home.layouts.app')

@section('title', $commodity['name'])
@section('class', 'goods-details')

@section('body')
    <div class="content">
        <div class="goods-show">
            <div class="goods-show-con">
                <div class="show-con-left">
                    <div class="thumbnail">
                        @for($i=1; $i<9; $i++)
                            @if(!empty($commodity['image_'.$i]))
                                <span @if ($i == 1) class="thumbnail-active"@endif>
                                    <img src="{{ $commodity['image_'.$i] }}"/>
                                </span>
                            @endif
                        @endfor
                    </div>
                    <div class="show-pic">
                        <div class="show-pic-con">
                            <img src="{{ $commodity['image_0'] }}"/>
                        </div>
                    </div>
                </div>
                <div class="show-con-right">
                    <div class="goods-title">
                        <h1>{{ $commodity->category->name }}</h1>
                        <h2>{{ $commodity['name'] }}</h2>
                        <span class="goods-price">￥{{ $commodity['price'] }}</span>
                    </div>
                    <div class="goods-color">
                        <h3>颜色选择</h3>
                        @foreach($attributes as $attribute)
                            @if ($attribute['alias'] == 'color')
                                @foreach(explode(',', $attribute['value']) as $value)
                                    <input name="color" type="radio" value="$value"/>
                                    {{ $value }}
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="goods-size">
                        <div class="goods-size-title">尺码表</div>
                        <div class="goods-size-choose clearfix">
                            <select class="size-num" style="width: 100%">
                                <option value="" disabled selected>选择尺码</option>
                                @foreach($attributes as $attribute)
                                    @if ($attribute['alias'] == 'size')
                                        @foreach(explode(',', $attribute['value']) as $value)
                                            <option value ="{{ $value }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                            <div class="prompting">请先选择尺码</div>
                        </div>
                    </div>
                    <div class="goods-size">
                        <div class="goods-size-title">购买数量</div>
                        <div class="goods-size-choose clearfix">
                            <select class="goods-num" style="float: left; width: 100%">
                                <option value ="1">1</option>
                                <option value ="2">2</option>
                                <option value="3">3</option>
                                <option value ="4">4</option>
                                <option value ="5">5</option>
                                <option value="6">6</option>
                                <option value ="7">7</option>
                                <option value ="8">8</option>
                                <option value="9">9</option>
                                <option value ="10">10</option>
                            </select>
                            <div class="prompting">请先选择尺码</div>
                        </div>
                    </div>
                    <div class="join-shoppingCart">加入购物车</div>
                    <div class="price-explain">
                        价格说明：上文显示的划线价格系该商品的建议零售价（而非法律意义上的原价），仅供您参考。
                    </div>
                </div>
            </div>
        </div>
        <div class="goods-introduce">
            <div class="goods-introduce-con">
                {!! $commodity['description'] !!}
            </div>
        </div>
        <div class="guess-u-like clearfix">
            <h1>猜你喜欢</h1>
            <div class="u-like swiper-container">
                <div class="swiper-wrapper">
                    @foreach($rand_commodity as $rand)
                        <div class="swiper-slide">
                            <a href="{{ route('home.commodity_view', ['id' => $rand['id']]) }}">
                                <img src="{{ $rand['image_0'] }}"/>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="shoppingCart-mask">
        <div class="shoppingCart-mask-con">
            <h1>成功加入购物袋 <span class="close"></span></h1>
            <div class="mask-details clearfix">
                <div class="mask-details-img">
                    <img src="../images/1_500X500.jpg"/>
                </div>
                <div class="mask-details-info">
                    <h2>中性  originals</h2>
                    <h3>Intack SPZL 经典鞋</h3>
                    <p class="mask-price">￥699</p>
                    <div class="goods-sku">
                        <p>颜色：<span>深绿/石膏白/深绿</span></p>
                        <p>尺码：<span>41</span></p>
                        <p>数量：<span>10</span></p>
                    </div>
                </div>
                <div class="mask-details-right">
                    <p><span>5</span>件商品</p>
                    <p>总计：<span>￥699</span></p>
                    <a href="###" class="btn-check">查看购物袋</a>
                    <a href="###" class="btn-clearing">立即结算</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    //缩略图
    $(".thumbnail span").click(function() {
        $(".thumbnail span").removeClass('thumbnail-active');
        $(this).addClass('thumbnail-active');
        var imgSrc = $(".thumbnail span").eq($(".thumbnail span").index(this)).children('img').attr('src');
        $(".show-pic-con img").attr('src', imgSrc);
    });

    //颜色选择
    $(".goods-details .goods-show .goods-show-con .show-con-right .goods-color ul li").click(function() {
        $(".goods-details .goods-show .goods-show-con .show-con-right .goods-color ul li").removeClass('active');
        $(this).addClass('active');
    });

    //猜你喜欢
    var bigPic = $('.u-like').swiper({
        pagination: '.u-like .swiper-pagination',
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

    //加入购物车
    $(".join-shoppingCart").click(function() {
        if($(".size-num").val() == null) {
            $(".prompting").show();
            $(".size-num").addClass('size-num-active');
        } else {
            $(".prompting").hide();
            $(".size-num").removeClass('size-num-active');
            $(".goods-details .shoppingCart-mask").show();
            $(".goods-details .shoppingCart-mask .shoppingCart-mask-con h1 .close").click(function() {
                $(".goods-details .shoppingCart-mask").hide();
            });
        }
    });
</script>
@endsection