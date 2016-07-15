@extends('index')
@section('content')
        <div id="InsertForm" class="div_box" align="center" @if ($errors->has('title') || $errors->has('text'))style="display:block;"@endif>
            <form method="post" action="/">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table border="1" width="400px;" class="table table-bordered">
                    <tr>
                        <td>
                            文章標題
                        </td>
                        <td>
                            <input type="text" name="title" value="{{old('title')}}"/>
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
                            <textarea name="text" rows="5" cols="40">{{old('text')}}</textarea>
                            @if ($errors->has('text'))
                                <div class="alert alert-danger">{{ $errors->first('text') }}</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="送出" />
                            <input type="reset" value="取消" />

                        </td>
                    </tr>
                </table>
            </form>
            <br/>
        </div>
        <table>
            <tr>
                <td>
                    @if(Session::has('member'))
                        <input type="button" value="新增文章" class="btn btn-primary" onclick="show()">
                    @endif
                    @if(!Session::has('member'))
                        <input type="button" value="註冊會員" class="btn btn-primary" onclick="window.location='regist'">
                        <input type="button" value="會員登入" class="btn btn-primary" onclick="window.location='regist/login'">
                    @else
                        <input type="button" class="btn btn-primary" value="{{session('member')}} 登出" onclick="window.location='regist/logout'">
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <table width="500px">
                        @foreach($article_list as $item)

                            <tr>
                                <td width="100px" align="right">
                                    <?php echo ++$ii; ?>.   發文人:
                                </td>
                                <td align="left" colspan="2">
                                    {{$item->name}}
                                </td>
                            </tr>
                            <tr>
                                <td width="100px" align="right">
                                    文章標題:
                                </td>
                                <td align="left" colspan="2">
                                    {{$item->title}}
                                </td>
                            </tr>
                            <tr>
                                <td width="100px" align="right">
                                     文章內容:
                                </td>
                                <td align="left"><?php echo nl2br($item->text); ?></td>
                                <td>
                                    @if ($item->login==session('member'))
                                        <input type="button" value="編輯" onclick="location.href='{{url('show/'.$item->id)}}'"/>
                                        <input type="button" value="刪除" onclick="location.href='{{url('delete/'.$item->id)}}'"/>
                                    @endif
                                    @if(Session::has('member'))
                                        <input type="button" value="回覆" onclick="location.href='{{url('reply/'.$item->id)}}'"/>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right" style="border-bottom: 1px solid black;">
                                    <font color="red">{{$item->addtime}}</font>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <ul class="pagination">

                    @if($article_list->currentPage()>1)
                        <li><a href="{{asset($article_list->url($article_list->currentPage()-1))}}">上一頁</a></li>
                    @endif
                    @for($page=1;$page<=$article_list->lastPage();$page++)
                        @if($article_list->currentPage()==$page)
                            <li class="active"><a href="{{ asset($article_list->url($page)) }}">{{$page}}</a></li>
                        @else
                            <li><a href="{{ asset($article_list->url($page)) }}">{{$page}}</a></li>
                        @endif
                    @endfor
                    @if($article_list->hasMorePages())
                        <li><a href="{{asset($article_list->url($article_list->currentPage()+1))}}">下一頁</a></li>
                    @endif
                    </ul>
                </td>
            </tr>
        </table>

    @endsection