<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->all();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($postId)
    {
        $post = $this->post->find($postId);
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'slug'  => 'required|unique:posts',
        ]);

        $inputs = $request->all();

        $this->post->create(array_merge($inputs, ['user_id' => Auth::user()->id]));
        return redirect('/posts')->with('success', 'Postagem criada');
    }

    public function edit($postId)
    {
        $post = $this->post->findOrFail($postId);
    
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, $postId)
    {
        $inputs = $request->all();
        
        $post = $this->post->findOrFail($postId);
        
        $post->fill($inputs)
                    ->save();

        return redirect('/posts')
                        ->with('success', 'A postagem foi alterada com sucesso.');
    }

    public function delete($postId)
    {       
        $this->post->destroy($postId);

            return redirect('/posts')
                   ->with('success', 'A postagem foi excluída com sucesso.');
    }
}
