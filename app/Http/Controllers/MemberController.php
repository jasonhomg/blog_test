<?php
/**
 * Created by PhpStorm.
 * User: jasonhong
 * Date: 2016/7/11
 * Time: 上午 11:46
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Blog\Member;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Rule;

class MemberController extends MasterController
{
    public function regist(){
        return view('regist');
    }
    public function regist_member(Request $request){
        $Rule = new Rule();
        $validator = Validator::make($request->all(), $Rule->rules(), $Rule->messages());
        if($validator->passes()) {
            $member = new Member();
            $member->insert($request->input('login'),$request->input('pass'),$request->input('name'));
            return redirect()->route('regist')->with('msg','註冊成功');
        }
        else{
            return redirect()->route('regist')->withInput()->withErrors($validator);
        }

        /*$member = new Member();
        $m = $member->insert($request->input('login'),$request->input('pass'),$request->input('name'));
        if($m=='true')
            return redirect()->route('home')->with('msg','註冊成功');
        else
            return redirect()->route('regist')->with('msg','帳號重複請重新申請');*/
    }
    public function loginpage(){
        return view('login');
    }
    public function login(Request $request){
        $member = new Member();
        $m = $member->select($request->input('login'),$request->input('pass'));
        if($m=='true')
            return redirect()->route('home')->with('msg','登入成功');
        else
            return redirect()->route('loginpage')->with('msg','登入失敗');
    }
    public function logout(){
        session()->forget('member');
        return redirect()->route('home')->with('msg','登出成功');
    }
}