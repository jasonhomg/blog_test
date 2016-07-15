<?php
/**
 * Created by PhpStorm.
 * User: jasonhong
 * Date: 2016/7/6
 * Time: 上午 09:39
 */

namespace App\Models\Blog;


use Illuminate\Support\Facades\DB;

class Article
{
    public function article_select(){
        $select = DB::table('articles')->select('articles.*','members.name')->join('members', 'articles.login', '=', 'members.login')->orderBy('articles.id','desc')->paginate(5);
        return $select;
    }

    public function  article_select_one($id){
        $select = DB::table('articles')->select('articles.*','members.name')->join('members', 'articles.login', '=', 'members.login')->where('articles.id', $id)->get();
        return $select;
    }

    public function article_insert($title,$text){
        $insert = DB::table('articles')->insert(['login'=>session('member'),'title'=>$title,'text'=>$text,'addtime'=>date('Y-m-d H:i:s')]);
    }

    public function article_update($title,$text,$id){
        $update = DB::table('articles')->where('id',$id)->update(['text'=>$text,'title'=>$title]);
    }

    public function article_delete($id){
        $delete = DB::table('articles')->where('id',$id)->delete();
    }

}