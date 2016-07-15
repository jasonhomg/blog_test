<?php
/**
 * Created by PhpStorm.
 * User: jasonhong
 * Date: 2016/7/11
 * Time: 上午 11:46
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class MasterController extends Controller
{
    public function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];
        if(str_is('*show*',$url) or str_contains($url,'reply')){
            if(!session()->has('member')){
                session()->flash('msg', '請登入會員');
                header("Location: http://develop.blog.com/");
            }
        }
    }
}