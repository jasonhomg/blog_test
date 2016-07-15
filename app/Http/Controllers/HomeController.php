<?php
/**
 * Created by PhpStorm.
 * User: jasonhong
 * Date: 2016/7/5
 * Time: 下午 03:11
 */

namespace App\Http\Controllers;

use App\Http\Requests\Rule;
use App\Models\Blog\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends MasterController
{

    public function index()
    {
        $article_list = new Article();
        $select = $article_list->article_select();
        $i = $select->perPage()*($select->currentPage()-1);
        return view('content', ['article_list' => $select,'ii' => $i]);
    }

    public function create(Request $request){
        $Rule = new Rule();
        $validator = Validator::make($request->all(), $Rule->rules(), $Rule->messages());
        if ($validator->passes()){
            $article_list = new Article();
            $article_list->article_insert($request->input('title'), $request->input('text'));
            return redirect()->route('home')->with('msg','新增成功');
        }
        else{
            return redirect()->route('home')->withInput()->withErrors($validator);
        }
        /*if($request->input('title')!="" && $request->input('text')!="") {
            $article_list = new Article();
            $article_list->article_insert($request->input('title'), $request->input('text'));
            return redirect()->route('home')->with('msg','新增成功');;
        }
        else{
            return redirect()->route('home')->with('msg', '新增失敗');
        }*/
    }
    public function show($id){
        $article_list = new Article();
        $list = $article_list->article_select_one($id);
        return view('show',['list'=>$list,'id'=>$id]);
    }
    public function update(Request $request){
        $Rule = new Rule();
        $validator = Validator::make($request->all(), $Rule->rules(), $Rule->messages());
        if ($validator->passes()) {
            $article_list = new Article();
            $article_list->article_update($request->input('title'), $request->input('text'), $request->input('id'));
            return redirect()->route('home')->with('msg', '修改成功');
        }
        else{
            return redirect()->back()->withErrors($validator);
        }
    }
    public function delete($id){
        $article_list = new Article();
        $article_list->article_delete($id);
        return redirect()->route('home')->with('msg', '刪除成功');
    }

}