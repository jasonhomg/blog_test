<?php
/**
 * Created by PhpStorm.
 * User: jasonhong
 * Date: 2016/7/12
 * Time: 上午 10:04
 */

namespace App\Http\Controllers;


use App\Models\Blog\Article;
use App\Models\Blog\Reply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;

class Replycontroller extends MasterController
{
    public function reply($id,$replyId = 'null'){
        $article_list = new Article();
        $article_lists = $article_list->article_select_one($id);
        $reply_list = new Reply();
        $reply_lists = $reply_list->reply_select($id);
        return view('replypage',['replyUp'=>$replyId,'reply_list'=>$reply_lists,'article_list'=>$article_lists,'id'=>$id]);
    }

    public function replyInsert(Request $request)
    {
        $rules = ['text' => 'required'];
        $messages = ['required' => '欄位不能空白!'];
        $validator = Validator::make($request->all(), $rules, $messages);
        $reply = new Reply();
        if ($validator->passes()) {
            $insert = $reply->insert($request->input('text'), $request->input('article_id'));
            return redirect()->route('reply', ['id' => $request->input('article_id')])->with('msg', '回覆成功');
        } else {
            return redirect()->route('reply', ['id' => $request->input('article_id')])->withErrors($validator);
        }
    }
    public function replyDelete($id){
        $reply = new Reply();
        $delete = $reply->replyDelete($id);
        return back()->with('msg','刪除成功');
    }
    public function replyUpdate(Request $request){
        $reply = new Reply();
        $update = $reply->replyUpdate($request->input('id'),$request->input('replyText'));
        return redirect()->route('reply',['id'=>$request->input('rid')])->with('msg','編輯成功');
    }
}