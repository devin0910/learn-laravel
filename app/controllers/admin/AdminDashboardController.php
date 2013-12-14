<?php

class AdminDashboardController extends BaseController {

	protected $layout = 'admin.layouts.admin';

	public function index()
	{
	    $this->layout->content = View::make('admin.dashboard.index');
	}

}