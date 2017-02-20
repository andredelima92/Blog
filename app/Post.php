<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Presenters\PostPresenter;

class Post extends Model
{
    use PresentableTrait;

    protected $presenter = PostPresenter::class;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'slug',
    ];
}
