<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'user', 'media'])
            ->whereHas('category', function ($query) {
                $query->whereStatus(1);
            })
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->wherePostType('post')
            ->whereStatus(1)
            ->latest()
            ->paginate(2);
        return view('frontend.index', compact('posts'));
    }

    public function post_show($slug)
    {
        $post = Post::with([
            'category', 'user', 'media',
            'approved_comments' => function ($query) {
                $query->latest();
            }
        ]);

        $post = $post->whereHas('category', function ($query) {
            $query->whereStatus(1);
        })
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->wherePostType('post')
            ->whereStatus(1)
            ->first();

        $post = $post->whereSlug($slug);
        $post = $post
            ->wherePostType('post')
            ->whereStatus(1)
            ->first();

        if ($post) {
            return view('frontend.post', compact('post'));
        } else {
            return redirect()->route('frontend.index');
        }
    }

    public function store_comment(Request $request, $slug)
    {
        $validation = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required|email',
            'url' => 'nullable|url',
            'comment' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $post = Post::whereSlug($slug)->wherePostType('post')->whereStatus(1)->first();

        if ($post) {

            $userId = auth()->check() ? auth()->id() : null;

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['url'] = $request->ip();
            $data['ip_address'] = $request->url;
            $data['comment'] = $request->comment;
            $data['post_id'] = $post->id;
            $data['user_id'] = $userId;

            // $post->comments->create($data);
            Comment::create($data);

            return redirect()->back()->with([
                'message' => 'Comment added succefuly',
                'alert_type' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'something was wrong',
            'alert_type' => 'danger'
        ]);
    }
}
