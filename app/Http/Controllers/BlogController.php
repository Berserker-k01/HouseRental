<?php

namespace App\Http\Controllers;

use DB;

class BlogController extends Controller
{
    public function blog()
    {
        $post=DB::table('posts')
            ->join('post_category','posts.category_id','post_category.id')
            ->select('posts.*','post_category.category_name_en','post_category.category_name_bn')
            ->paginate(6);
        return view('pages.blog',compact('post'));
    }


    public function description($id){
        $post=DB::table('posts')
            ->join('post_category','posts.category_id','post_category.id')
            ->select('posts.*','post_category.category_name_en','post_category.category_name_bn')
            ->where('posts.id',$id)
            ->first();
        return view('pages.blogDescription',compact('post'));
    }

}
