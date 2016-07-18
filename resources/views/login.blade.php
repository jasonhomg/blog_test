@extends('index')

@section('content')
    <form method="post" action="{{url('regist/login')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <table class="table">
            <thead><font size="20px"> v0~登入會員~ </font></thead>
            <tbody>
            <tr>
                <td>帳號</td><td><input type="text" name="login" /></td>
            </tr>git
            <tr>
                <td>密碼</td><td><input type="password" name="pass" /></td>
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
