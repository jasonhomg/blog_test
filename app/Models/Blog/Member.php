<?php
/**
 * Created by PhpStorm.
 * User: jasonhong
 * Date: 2016/7/11
 * Time: 上午 11:50
 */

namespace App\Models\Blog;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Member
{
    public function insert($login,$pass,$name){
        $insert = DB::table('members')->insert(['login' => $login, 'password' => Hash::make($pass), 'name' => $name,'addtime'=> date('Y-m-d H:i:s')]);
    }

    public function select($login,$pass){
        $select = DB::table('members')->where('login',$login)->count();
        if($select > 0){
            $passed = DB::table('members')->where('login',$login)->value('password');
            if (Hash::check($pass, $passed))
            {
                session(['member' => $login]);
                return 'true';
            }
        }
        return 'false';
    }
}