<?php

class UserController extends BaseController {


	protected $layout = 'layouts.main';


	public function index(){}


	public function profile()
	{
		$user = User::find(Auth::user()->id);
		$this->layout->content = View::make('user.show')->with('user', $user);
	}

}