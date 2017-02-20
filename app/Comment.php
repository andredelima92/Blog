<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Presenters\CommentPresenter;

class Comment extends Model
{
	use PresentableTrait;

	protected $presenter = CommentPresenter::class;

    protected $fillable = [
        'post_id',
        'user_id',
        'description',
    ];
}
