<?php
/**
 * Created by PhpStorm.
 * User: jasonhong
 * Date: 2016/7/13
 * Time: 下午 04:40
 */
namespace App\Http\Requests;

class Rule
{
    public function rules()
    {
        return [
            'login' => 'sometimes|required|unique:members,login',
            'name' => 'sometimes|required',
            'pass' => 'sometimes|required',
            'passCheck' => 'sometimes|required|same:pass',
            'title' => 'sometimes|required',
            'text' => 'sometimes|required'
        ];
    }
    public function messages(){
        return [
            'required' => '欄位不能空白!',
            'unique' => '帳號重覆',
            'same' => '密碼不一致'
        ];
    }
}