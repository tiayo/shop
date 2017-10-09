@extends('home.layouts.app')

@section('title', '编辑个人信息')
@section('class', 'info-edit')

@section('body')
    <div class="content clearfix">
        <form id="update_form" method="post" enctype="multipart/form-data" action="{{ route('home.person_update') }}">
            {{ csrf_field() }}
            <div class="login-right">
                <h1>编辑个人信息</h1>
                <div class="login-detial">
                    <div class="portrait-file">
                        <img src="{{ $user['avatar'] }}"/>
                        <span class="file-btn">上传头像</span>
                        <input type="file" name="avatar"/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="name" value="{{ $user['name'] }}" placeholder="请输入新的用户名"/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="phone" value="{{ $user['phone'] }}" placeholder="请输入电话号码"/>
                    </div>
                    <div class="form-input">
                        <input type="text" name="address" value="{{ $user['address'] }}" placeholder="请输入您的收货地址"/>
                    </div>
                    <div class="login-btn">
                        <a href="#" onclick="update_form()">确定</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
       function update_form() {
           $('#update_form').submit();
       }
    </script>
@endsection