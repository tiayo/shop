@extends('home.layouts.app')

@section('title', '个人中心')
@section('class', 'personal')

@section('body')
    <div class="content">
        <div class="user">
            <img src="{{ Auth::user()['avatar'] }}" class="user-portrait" />
            <span class="user-name">{{ Auth::user()['name'] }}</span>
            <a href="{{ route('home.person_update') }}">编辑</a>
        </div>
        <div class="order">
            <h1>
                我的订单
                <em class="on">全部</em>
                <em>待发货</em>
                <em>待收货</em>
                <em>已完成</em>
            </h1>
            <ul style="display: block;">
                @foreach($orders_all as $order)
                    <li class="order-list">
                        @foreach($order->orderDetail as $list_detail)
                            <div>
                                <img src="{{ $list_detail->commodity->image_0 }}" class="order-img"/>
                                <span class="order-name">{{ $list_detail->commodity->name }}</span>
                                <span class="order-user">{{ $order->user->name }}</span>
                                <span class="order-price">￥
                                    <em>
                                        {{ $list_detail->price * $list_detail->num }}
                                    </em>
                                </span>
                                <span class="order-time">{{ $order['created_at'] }}</span>
                                <span class="order-state"> {{ config('site.order_status')[$order['status']] }}</span>
                                <a href="{{ route('home.order_view', ['order_id' => $order['id']]) }}" class="order-details">查看</a>
                            </div>
                        @endforeach
                    </li>
                @endforeach
            </ul>
            <ul>
                @foreach($orders_1 as $order)
                    <li class="order-list">
                        @foreach($order->orderDetail as $list_detail)
                            <div>
                                <img src="{{ $list_detail->commodity->image_0 }}" class="order-img"/>
                                <span class="order-name">{{ $list_detail->commodity->name }}</span>
                                <span class="order-user">{{ $order->user->name }}</span>
                                <span class="order-price">￥
                                    <em>
                                        {{ $list_detail->price * $list_detail->num }}
                                    </em>
                                </span>
                                <span class="order-time">{{ $order['created_at'] }}</span>
                                <span class="order-state"> {{ config('site.order_status')[$order['status']] }}</span>
                                <a href="{{ route('home.order_view', ['order_id' => $order['id']]) }}" class="order-details">查看</a>
                            </div>
                        @endforeach
                    </li>
                @endforeach
            </ul>
            <ul>
                @foreach($orders_2 as $order)
                    <li class="order-list">
                        @foreach($order->orderDetail as $list_detail)
                            <div>
                                <img src="{{ $list_detail->commodity->image_0 }}" class="order-img"/>
                                <span class="order-name">{{ $list_detail->commodity->name }}</span>
                                <span class="order-user">{{ $order->user->name }}</span>
                                <span class="order-price">￥
                                    <em>
                                        {{ $list_detail->price * $list_detail->num }}
                                    </em>
                                </span>
                                <span class="order-time">{{ $order['created_at'] }}</span>
                                <span class="order-state"> {{ config('site.order_status')[$order['status']] }}</span>
                                <a href="{{ route('home.order_view', ['order_id' => $order['id']]) }}" class="order-details">查看</a>
                            </div>
                        @endforeach
                    </li>
                @endforeach
            </ul>
            <ul>
                @foreach($orders_4 as $order)
                    <li class="order-list">
                        @foreach($order->orderDetail as $list_detail)
                            <div>
                                <img src="{{ $list_detail->commodity->image_0 }}" class="order-img"/>
                                <span class="order-name">{{ $list_detail->commodity->name }}</span>
                                <span class="order-user">{{ $order->user->name }}</span>
                                <span class="order-price">￥
                                    <em>
                                        {{ $list_detail->price * $list_detail->num }}
                                    </em>
                                </span>
                                <span class="order-time">{{ $order['created_at'] }}</span>
                                <span class="order-state"> {{ config('site.order_status')[$order['status']] }}</span>
                                <a href="{{ route('home.order_view', ['order_id' => $order['id']]) }}" class="order-details">查看</a>
                            </div>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(".personal .content .order h1 em").click(function() {
            $(this).addClass('on').siblings().removeClass('on');
            $(".personal .content .order ul").hide().eq($(".personal .content .order h1 em").index(this)).show();
        });
    </script>
@endsection