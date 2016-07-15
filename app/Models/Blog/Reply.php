<?php

namespace App\Models\Blog;

use Illuminate\Support\Facades\DB;

class Reply
{
    public function insert($text,$article_id){
        $insert = DB::table('replys')->insert(['article_id'=>$article_id,'text'=>$text,'login'=>session('member'),'addtime'=>date('Y-m-d H:i:s')]);
    }
    public function reply_select($id){
        $select = DB::table('replys')->select('replys.*','members.name')->join('members', 'replys.login', '=', 'members.login')->where('article_id',$id)->get();
        return $select;
    }
    public function replyDelete($id){
        $delete = DB::table('replys')->where('id',$id)->delete();
    }
    public function replyUpdate($id,$text){
        $update = DB::table('replys')->where('id',$id)->update(['text'=>$text]);
    }
}