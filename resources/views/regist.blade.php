@extends('index')
@section('content')
    <form method="post" action="{{url('regist')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table class="table">
        <thead><font size="20px"> 註冊會員 </font></thead>
        <tbody>
            <tr>
                <td>帳號</td>
                <td align="center">
                    <input type="text" name="login" value="{{old('login')}}" />
                    @if ($errors->has('login'))
                        <div class="alert alert-danger" style="width: 180px;">{{ $errors->first('login') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>姓名</td>
                <td align="center" >
                    <input type="text" name="name" value="{{old('name')}}"/>
                    @if ($errors->has('name'))
                        <div class="alert alert-danger" style="width: 180px;">{{ $errors->first('name') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>密碼</td>
                <td align="center">
                    <input type="password" name="pass" value="{{old('pass')}}"/>
                    @if ($errors->has('pass'))
                        <div class="alert alert-danger" style="width: 180px;">{{ $errors->first('pass') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>確認密碼</td>
                <td align="center">
                    <input type="password" name="passCheck" value="{{old('passCheck')}}"/>
                    @if ($errors->has('passCheck'))
                        <div class="alert alert-danger" style="width: 180px;">{{ $errors->first('passCheck') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="送出" />
                    <input type="reset" value="取消" />
                    <input type="button" value="回首頁" onclick="window.location='/'"/>
                </td>
            </tr>
        </tbody>
    </table>
    </form>
@endsection