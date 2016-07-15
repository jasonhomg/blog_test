@extends('index')
@section('content')


        @foreach($article_list as $item)
            <table align="center" class="table" style="width:800px;">
                <tr>
                    <td width="100px">
                        發文人
                    </td>
                    <td align="left">
                        {{$item->name}}
                    </td>
                </tr>
                <tr>
                    <td width="100px">
                        文章標題
                    </td>
                    <td align="left">
                        {{$item->title}}
                    </td>
                </tr>
                <tr>
                    <td>
                        文章內容
                    </td>
                    <td align="left">
                        {{$item->text}}
                    </td>
                </tr>

            </table>
        @endforeach
            <table class="table table-striped" style="width: 800px;">
                @foreach($reply_list as $item)
                <tr>
                    <td align="right" style="padding-left: 50px;" width="90px;">
                        {{$item->name }}:
                    </td>
                    <td align="left" >
                        <div width="100%">
                            <div width="90%" style="float: left; word-break: break-all;">
                                @if($replyUp==$item->id)
                                    <form method="post" action="{{url('reply/update/')}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="rid" value="{{$id}}">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="text" name="replyText" value="{{$item->text}}" size="78"/>
                                        <input type="submit" value="編輯">
                                    </form>
                                @else
                                    <?php echo nl2br($item->text);?>
                                @endif
                            </div>
                            <div width="10%" style="float: right;">
                                @if(session('member')==$item->login)
                                <a href="{{url('reply/'.$id.'/'.$item->id)}}">修改</a>
                                <a href="{{url('replyDelete/'.$item->id)}}">刪除</a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            <br/><br/>
        <form method="post" action="{{url('reply/insert/')}}" id="form2">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="article_id" value="{{$id}}">
            <table width="800px" class="table">
                <tr>
                    <td>
                        回覆內容
                    </td>
                    <td align="left">
                        <textarea name="text" rows="5" cols="40">{{old('text')}}</textarea>
                        @if ($errors->has('text'))
                            <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="回覆" />
                        <input type="reset" value="取消" />
                        <input type="button" value="回首頁" onclick="window.location='/'"/>
                    </td>
                </tr>
            </table>

        </form>
@endsection