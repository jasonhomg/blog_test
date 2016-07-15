<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    public function show()
    {
        $users = DB::table('posts')->get();

        return $users;
    }
    public function insert($title,$text){
        DB::table('posts')->insert(['title'=>$title,'text'=>$text]);
    }
}
