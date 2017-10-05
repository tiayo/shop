@extends('home.layouts.app')

@section('title', 's')
@section('class', 'goods-list')

@section('body')
    <div class="content clearfix">
        <div class="content-right">
            <div class="goods-con">
                @foreach($commodities as $commodity)
                    <a href="{{ route('home.commodity_view', ['id' => $commodity['id']]) }}">
                        <img src="{{ $commodity['image_0'] }}"/>
                        <span>{{ $commodity['name'] }}</span>
                        <em>￥{{ $commodity['price'] }}</em>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection