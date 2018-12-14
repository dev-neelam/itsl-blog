<?php

namespace itsl\blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getIndex() {
        $posts = DB::table('users')->leftjoin('posts', 'users.id', '=', 'posts.author')->paginate(2);
        $archives = DB::table('posts')->orderBy('id', 'DESC')->get();
        $data = array(
            'posts' => $posts,
            'archives' => $archives
        );
        return view('vendor.itsl.post.index', $data);
    }
    public function getFullPost($post_id) {
        $post = DB::table('users')->leftjoin('posts', 'users.id', '=', 'posts.author')->where('posts.id', '=', $post_id)->first();
        return view('vendor.itsl.post.read', ['post' => $post]);
    }
}