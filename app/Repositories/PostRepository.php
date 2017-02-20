<?php

namespace App\Repositories;

use App\Post;

class PostRepository extends BaseRepository
{
	public function __construct(Post $model)
	{
		$this->model = $model;
	}
}