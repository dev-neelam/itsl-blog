<?php

namespace itsl\blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('vendor.itsl.home', ['posts' => $posts]);
    }

    public function getPostForm() 
    {
        return view('vendor.itsl.post.post_form');
    }

    public function createPost(Request $request)
    {
        $post = Post::create(array(
            'title'         => Input::get('title'),
            'description'   => Input::get('description'),
            'author'        => Input::get('author'),
            'category'      => Input::get('category'),
            'publish_date'  => date('Y-m-d', strtotime(Input::get('publish_date'))),
            'published'     => true
        ));

        $post_cover         = Input::file('post_cover');
        $post_cover_name    = $post_cover ? $post_cover->getClientOriginalName() : null;

        // rename poster file
        if($post_cover_name && $post_cover){
            $post_covername = $post->id;

            // move file with updated file name
            $destination_path = public_path();
            $post_cover->move($destination_path, $post_covername);
        }

        return redirect()->route('home')->with('success', 'Post has been successfully added!');
    }

    public function getPost($id)
    {
        $post = Post::find($id);
        return view('vendor.itsl.post.post_detail', ['post' => $post]);
    }

    public function editPost($id) {
        $post = Post::find($id);
        return view('vendor.itsl.post.edit_post', ['post' => $post]);
    }

    public function updatePost(Request $request, $id) {
        $post               = Post::find($id);
        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->category     = $request->category;
        $post->author       = $request->author;
        $post->publish_date = date('Y-m-d', strtotime(Input::get('publish_date')));
        $post->published    = true;
        $post->save();

        $post_cover         = Input::file('post_cover');
        $post_cover_name    = $post_cover ? $post_cover->getClientOriginalName() : null;

        // rename poster file
        if($post_cover_name && $post_cover){
            $post_covername = $post->id;

            // move file with updated file name
            $destination_path = public_path();
            $post_cover->move($destination_path, $post_covername);
        }

        return redirect()->route('home')->with('success', 'Post has been updated successfully!');
    }

    public function deletePost($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Post has been deleted successfully!');
    }
}