<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    protected $comment;
    protected $post;

    public function __construct(Comment $Comment, Post $Post)
    {
        $this->comment = $Comment;
        $this->post    = $Post;
    }

    public function index($postId)
    {
        $post = $this->post->find($postId);
        $comment = $this->comment->all()->where('post_id' , $postId);

        return view('comments.show', [
            'comments'  => $comment,
            'post'      => $post,
            'user_name' => Auth::user()->name,
        ]);
    }

   /* public function show($postId)
    {
    }

    public function create()
    {
        return view('posts.create');
    }
*/
    public function store(Request $request)
    {
        $inputs = array_merge($request->all(), ['user_id' => Auth::user()->id]);
        
        $validator = Validator::make($inputs, [
            'description' => 'required',
            'user_id'     => 'required',
            'post_id'     => 'required',
        ]);

        /*if ($validator->fails()) {
            return redirect('/comments/'. $inputs['post_id'])->withErrors($validator->errors());
        }*/

        $this->comment->create($inputs);
        return redirect('/comments/'. $inputs['post_id'])->with('success', 'Comentario adicionado com sucesso!');
    }

    /*public function edit($postId)
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
*/
    public function delete($commentId, Request $request)
    {    
        $postId =$request->post_id;

        $this->comment->destroy($commentId);

        return redirect('/comments/'. $postId)
                       ->with('success', 'O comentatio foi excluído com sucesso.');
    }
}
