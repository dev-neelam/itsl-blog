<?php

namespace itsl\blog\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getIndex()
    {
        $categories     = Post::query()
            ->select('category')
            ->groupBy('category')
            ->take(5)
            ->get()
            ->pluck('category')
            ->toArray();

        $posts      = Post::query()
            ->where('published', true)
            ->orderBy('publish_date', 'DESC')
            ->get();

        $archives   = [];
        foreach ($posts as $post) {
            $publish_date       = $post->publish_date;

            $month              = date('F, Y', strtotime($publish_date));
            $archives[$month][] = $post;
        }

        return view('vendor.itsl.post.index')
            ->with('posts', $posts)
            ->with('categories', $categories)
            ->with('archives', $archives);
    }

    public function getFullPost($post_id)
    {
        $categories     = Post::query()
            ->select('category')
            ->groupBy('category')
            ->take(5)
            ->get()
            ->pluck('category')
            ->toArray();

        $post   = Post::find($post_id);

        $posts  = Post::query()
            ->where('published', true)
            ->orderBy('publish_date', 'DESC')
            ->get();
        $archives   = [];
        foreach ($posts as $post) {
            $publish_date       = $post->publish_date;

            $month              = date('F, Y', strtotime($publish_date));
            $archives[$month][] = $post;
        }

        return view('vendor.itsl.post.read')
            ->with('post', $post)
            ->with('categories', $categories)
            ->with('archives', $archives)
            ->with('posts', $posts);
        
    }
}