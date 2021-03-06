<?php

namespace blog\Http\Controllers;

use blog\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use blog\Http\Requests;
use blog\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('listPosts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'body' =>  'required',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('post_create_path')
                    ->withErrors($validator)
                    ->withInput();
            }

            $post = new Post;
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            $post->user_id = Auth::id();
            $post->save();

            return redirect()->route('post_show_path', $post->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->save();

        return redirect()->route('post_show_path', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post_list_path')->withErrors('Post Eliminado');
    }
}
