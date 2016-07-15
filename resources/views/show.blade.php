@extends('index')
@section('content')
        <form method="post" action="/show/update">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @foreach($list as $item)
                <input type="hidden" name="id" value="{{$item->id}}" >
        <table align="center" class="table table-bordered">
            <tr>
                <td>
                    文章標題
                </td>
                <td align="left"><input type="text" name="title" value="{{$item->title}}">
                    @if ($errors->has('title'))
                        <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    文章內容
                </td>
                <td>
                    <textarea name="text" rows="10" cols="50">{{$item->text}}</textarea>
                    @if ($errors->has('text'))
                        <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="送出" />
                    <input type="reset" value="取消" />
                    <input type="button" value="回上一頁1111" onclick="window.location='/'"/>
                </td>
            </tr>
        </table>
            @endforeach
        </form>
@endsection