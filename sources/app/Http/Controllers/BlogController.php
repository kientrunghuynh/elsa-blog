<?php
namespace App\Http\Controllers;

use App\Jobs\BlogIndexData;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $var = 'tmp';
        if ($var == 'tmp')
        {
            $var2 = 'tmp2';
            if ($var2 != 'tmp') {
                if ($var2 == $var) {
                    $var3 = 'sample';
                    if ($var == $var3) {
                        $test = 'checked';
                    }
                    else
                        $var ==$var3;
                }else {
                    $var2 = $var;
                }
            }
        }

        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';
        ssfdsf 
        return view($layout, $data);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($post->layout, compact('post', 'tag'));
    }
}