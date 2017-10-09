@extends('home.layouts.app')

@section('title', Auth::user()['name'].'的购物车')

@section('class', 'login')

@section('body')
<div class="login">
    <div class="content clearfix">
        <form id="login_form" method="post" action="{{ route('home.login') }}">
            {{ csrf_field() }}
            <div class="login-left">
                <h1>登录</h1>
                <div class="login-detial">
                    <div class="form-input">
                        <input type="email" name="email" placeholder="请输入邮箱"/>
                    </div>
                    <div class="form-input">
                        <input type="password" name="password" placeholder="请输入密码"/>
                    </div>
                    <div class="login-btn">
                        <a href="#" onclick="login_form()">登录</a>
                    </div>
                </div>
            </div>
        </form>
        <form id="register_form" method="post" action="{{ route('home.register') }}">
            {{ csrf_field() }}
            <div class="login-right">
                <h1>注册</h1>
                <div class="login-detial">
                    <div class="form-input">
                        <input type="email" name="email" placeholder="请输入邮箱" required/>
                    </div>
                    <div class="form-input">
                        <input type="password" name="password" placeholder="请输入密码" required/>
                    </div>
                    <div class="form-input">
                        <input type="password" name="password_confirmation" placeholder="请再次输入密码密码" required/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="name" placeholder="请输入用户名" required/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="phone" placeholder="请输入电话号码"/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="address" placeholder="请输入您的收货地址"/>
                    </div>
                    <div class="login-btn">
                        <a href="#" onclick="register_form()">注册</a>
                    </div>
                </div>
            </div>
        </form>
            @if(count($errors->all()) > 0)
                <div class="msg-block" style="width: 100%;margin-top: 2em;">
                    @foreach($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            @endif
    </div>
@endsection

@section('script')
   <script>
       function login_form() {
           $('#login_form').submit();
       }

       function register_form() {
           $('#register_form').submit();
       }
   </script>
@endsection