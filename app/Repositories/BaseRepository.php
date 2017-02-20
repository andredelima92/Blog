<?php

namespace App\Repositories;

class BaseRepository
{
	protected $model;

	public function findAll()
	{
		return $this->model->all();
	}

	public function findById($id)
	{
		return $this->model->findOrFail($id);
	}

	public function all()
	{
		return $this->model->all();
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function update(array $data, $id)
	{
		$base = $this->model->findOrFail($id);

		return $base->fill($data)->save();
	}

	public function delete($id)
	{
		return $this->model->destroy($id);
	}
}
