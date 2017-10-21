@inject('index', 'App\Services\Home\IndexService')
@inject('car', 'App\Services\Home\CarService')
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
<div class="@yield('class')" id="@yield('id')">
    <header>
        <div class="head-left"><a href="/">{{ config('site.title') }}</a></div>
        <div class="head-con">
            <ul class="nav-top">
                @foreach($parents = $index->getCategoryParent() as $parent)
                    <li><span>{{ $parent['name'] }}</span></li>
                @endforeach
            </ul>
            @if(Auth::check())
                <a href="{{ route('home.person') }}" class="login">{{ Auth::user()['name'] }}</a>
                <a href="{{ route('home.logout') }}" style="float: right;color: white;margin: 5px -35px;">退出</a>
            @else
            <a href="{{ route('home.login') }}" class="login">注册/登录</a>
            @endif
            <a href="{{ route('home.car') }}" class="shopping-cart"><em>{{ $car->count() }}</em></a>
            <form method="get" action="{{ route('home.search') }}">
                <div class="search">
                    <span class="searchBtn"></span>
                    <input type="text" name="keyword" placeholder="商品搜索"/>
                </div>
            </form>
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
            @foreach($parents as $parent)
            <li>
                <h1>{{ $parent['name'] }}</h1>
                @foreach($index->getCategoryChildren($parent['id']) as $children)
                    <a href="{{ route('home.category_view', ['id' => $children['id']]) }}">
                        {{ $children['name'] }}
                    </a>
                @endforeach
            </li>
            @endforeach
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