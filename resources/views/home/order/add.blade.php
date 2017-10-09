@extends('home.layouts.app')

@section('title', '订单确认')
@section('class', 'order-clearing')
@section('id', 'app')

@section('style')
    <script src="{{ asset('/style/home/js/vue.js') }}"></script>
@endsection

@section('body')
    <form action="{{ route('home.order_add') }}" method="post" class="content">
        {{ csrf_field() }}
        <div class="delivery-info">
            <h1>收货人信息</h1>
            <div>
                <label for="">收件人：</label>
                <input type="text" name="name" class="delivery-name" v-model="name"/>
            </div>
            <div>
                <label for="">电话号码：</label>
                <input type="text" name="phone" class="delivery-tel" v-model="tel"/>
            </div>
            <div>
                <label for="">收件地址：</label>
                <input type="text" name="address" class="delivery-address" v-model="address"/>
            </div>
        </div>
        <div class="pay-way clearfix">
            <h1>选择支付方式</h1>
            <span class="wechat on">微信支付</span>
            <span class="alipay">支付宝</span>
        </div>
        <div class="myOrder-state">
            @foreach($cars as $car)
                <div class="myOrder-state-list clearfix">
                    <div class="state-left">
                        <img src="{{ $car->commodity->image_0 }}" class="state-img"/>
                        <h6>配送信息</h6>
                        <h1>送货方式：<em>快递</em></h1>
                        <h2>商品名：<em>{{ $car->commodity->name }}</em></h2>
                        <h3>货运单号：<em>{{ $car['id'] }}</em></h3>
                    </div>
                    <div class="state-mid">
                        <h6>收货人信息</h6>
                        <h1>收货人：<em>@{{name}}</em></h1>
                        <h2>手机号码：<em>@{{tel}}</em></h2>
                        <h3>地址：<em>@{{address}}</em></h3>
                    </div>
                    <div class="state-right">
                        <h6>付款信息</h6>
                        <h1>付款方式：<em>未选择</em></h1>
                        <h2>商品总额：<span>￥<em>{{ $car['price'] }}</em></span></h2>
                        <h3>运费金额：<span>￥<em>0</em></span></h3>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="submit" type="submit">提交订单</button>
    </form>
@endsection
@section('script')
<script type="text/javascript">
    var app = new Vue({
        el: '#app',
        data: {
            name: '{{ Auth::user()['name'] }}',
            tel: '{{ Auth::user()['phone'] }}',
            address: '{{ Auth::user()['address'] }}',
        }
    });
</script>
<script type="text/javascript">
    $(".state-right h1 em").html($(".pay-way .on").html());
    $(".pay-way span").on("click", function() {
        $(this).siblings().removeClass('on');
        $(this).addClass('on');
        $(".state-right h1 em").html($(this).html());
    });
</script>
@endsection