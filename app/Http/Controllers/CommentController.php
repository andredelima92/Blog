<?php

namespace App\Http\Controllers;

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


    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'post_id'     => 'required',
        ]);

        $inputs = array_merge($request->all(), ['user_id' => Auth::user()->id]);

        $this->comment->create($inputs);
        return redirect('/comments/'. $inputs['post_id'])->with('success', 'Comentario adicionado com sucesso!');
    }


    public function delete($commentId, Request $request)
    {    
        $postId =$request->post_id;

        $this->comment->destroy($commentId);

        return redirect('/comments/'. $postId)
                       ->with('success', 'O comentatio foi excluído com sucesso.');
    }
}
