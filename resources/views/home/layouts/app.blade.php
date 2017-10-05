<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')-{{config('site.title')}}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/style/home/css/reset.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/style/home/css/swiper-3.4.1.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/style/home/css/public-css.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/style/home/css/style.css') }}"/>
    <script src="{{ asset('/style/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/style/home/js/public-js.js') }}"></script>
    <script src="{{ asset('/style/home/js/swiper-3.4.1.jquery.min.js') }}"></script>
    @section('style')
    @show
</head>
<body>
<div class="index clearfix">
    <header>
        <div class="head-left"><a href="index.html">周进森の假鞋店</a></div>
        <div class="head-con">
            <ul class="nav-top">
                <li><span>男子</span></li>
                <li><span>女子</span></li>
                <li><span>儿童</span></li>
                <li><span>运动</span></li>
                <li><span>品牌</span></li>
            </ul>
            <a href="#" class="login">注册/登录</a>
            <a href="cn/shopping-cart.html" class="shopping-cart"><em>1</em></a>
            <div class="search">
                <span class="searchBtn"></span>
                <input type="text" placeholder="商品搜索"/>
            </div>
        </div>
        <ul class="nav-menu">
            <li>
                <h1>最新活动</h1>
                <a href="cn/goods-list.html">新品上市</a>
                <a href="cn/goods-list.html">Athletics|ZNE</a>
                <a href="cn/goods-list.html">Originals|TUBULAR</a>
                <a href="cn/goods-list.html">adidas neo|生来好动</a>
                <a href="cn/goods-list.html">TERREX</a>
                <a href="cn/goods-list.html">miadidas 个性化定制</a>
                <a href="cn/goods-list.html">全部男子折扣</a>
            </li>
            <li>
                <h1>鞋类</h1>
                <a href="cn/goods-list.html">Originals</a>
                <a href="cn/goods-list.html">adidas neo</a>
                <a href="cn/goods-list.html">跑步</a>
                <a href="cn/goods-list.html">户外</a>
                <a href="cn/goods-list.html">训练</a>
                <a href="cn/goods-list.html">网球</a>
                <a href="cn/goods-list.html">拖鞋</a>
            </li>
            <li>
                <h1>服饰类</h1>
                <a href="cn/goods-list.html">上衣</a>
                <a href="cn/goods-list.html">短袖T恤</a>
                <a href="cn/goods-list.html">长袖T恤</a>
                <a href="cn/goods-list.html">马甲</a>
                <a href="cn/goods-list.html">运动卫衣</a>
                <a href="cn/goods-list.html">夹克/外套</a>
                <a href="cn/goods-list.html">运动下装</a>
                <a href="cn/goods-list.html">泳裤</a>
                <a href="cn/goods-list.html">比赛服</a>
            </li>
            <li>
                <h1>附配件类</h1>
                <a href="cn/goods-list.html">包</a>
                <a href="cn/goods-list.html">袜子</a>
                <a href="cn/goods-list.html">帽子/手套/围巾</a>
                <a href="cn/goods-list.html">足球/篮球</a>
                <a href="cn/goods-list.html">运动装备</a>
            </li>
            <li>
                <h1>运动分类</h1>
                <a href="cn/goods-list.html">跑步</a>
                <a href="cn/goods-list.html">户外</a>
                <a href="cn/goods-list.html">训练</a>
                <a href="cn/goods-list.html">足球</a>
                <a href="cn/goods-list.html">篮球</a>
                <a href="cn/goods-list.html">网球</a>
                <a href="cn/goods-list.html">游泳</a>
                <a href="cn/goods-list.html">高尔夫</a>
            </li>
        </ul>
    </header>

    @section('body')
    @show

    <footer>
        <div class="footer-con">
            <ul class="nav-bottom clearfix">
                <li>
                    <a href="#">电子礼品卡</a>
                    <a href="#">附近商店</a>
                    <a href="#">222</a>
                    <a href="#">333</a>
                    <a href="#">444</a>
                    <a href="#">555</a>
                    <a href="#">666</a>
                </li>
                <li>
                    <a href="#">新品上市</a>
                    <a href="#">111</a>
                    <a href="#">222</a>
                    <a href="#">333</a>
                    <a href="#">444</a>
                    <a href="#">555</a>
                    <a href="#">666</a>
                </li>
                <li>
                    <a href="#">新品上市</a>
                    <a href="#">111</a>
                    <a href="#">222</a>
                    <a href="#">333</a>
                    <a href="#">444</a>
                    <a href="#">555</a>
                    <a href="#">666</a>
                </li>
            </ul>
            <div class="copyright">版权所有 周进森 2017</div>
        </div>
    </footer>
</div>
@section('script')
@show
</body>
</html>