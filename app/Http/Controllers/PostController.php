<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->findAll();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($postId)
    {
        $post = $this->post->findById($postId);
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
        $post = $this->post->findById($postId);
    
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, $postId)
    {
        $inputs = $request->all();
        
        $this->post->update($inputs ,$postId);
        
        return redirect('/posts')
                        ->with('success', 'A postagem foi alterada com sucesso.');
    }

    public function delete($postId)
    {       
        $this->post->delete($postId);

            return redirect('/posts')
                   ->with('success', 'A postagem foi excluída com sucesso.');
    }
}
