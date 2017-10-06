@extends('home.layouts.app')

@section('title', Auth::user()['name'].'的购物车')

@section('class', 'shopping-cart')

@section('body')
    <div class="content">
        <div class="shopping-cart-left">
            <div class="cart-title clearfix">
                <h1>您的购物袋 <span>共 {{ $count }} 件</span></h1>
                <a href="/">继续购物</a>
            </div>
            <div class="cart-product-con">
                <div class="cart-product-select-all clearfix">
                    <div class="checkall">
                        <span></span>全选
                    </div>
                    <p class="cart-selected-num">
                        （已选中 <span>0</span> 件）
                    </p>
                </div>
                <div class="cart-product-list">
                    @foreach($lists as $list)
                        @php
                            $attributes = explode('|', $list['remark']);
                            foreach ($attributes as $attribute) {
                                $explode = explode(':', $attribute);
                                $attr[$explode[0]] = $explode[1];
                            }
                         @endphp
                        <div class="cart-product-info clearfix">
                            <div class="check"></div>
                            <img src="{{ $list->commodity->image_0 }}" class="cart-product-img"/>
                            <div class="cart-product-details">
                                <p>
                                    <a href="{{ $list->commodity->id }}">{{ $list->commodity->name }}</a>
                                    <span class="info-code">商品编号：{{ $list->commodity->id }}</span>
                                </p>
                                <div class="info-describe">
                                    <p>价格：<span>￥{{ $list['price'] }}</span></p>
                                    <p>颜色：<span>{{ $attr['color'] }}</span></p>
                                    <p class="info-size">尺码：<span>{{ $attr['size'] }}</span></p>
                                    <div class="info-price-num">

                                    </div>
                                </div>
                            </div>
                        </div>
                   @endforeach
                </div>
            </div>
        </div>
        <div class="shopping-cart-right"></div>
    </div>
@endsection