<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;

class BasePresenter extends Presenter
{
	public function createdAt()
	{
		return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
	}

	public function updatedAt()
	{
		return Carbon::parse($this->updated_at)->format('d/m/Y H:i:s');
	}

}