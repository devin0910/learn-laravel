<?php

class AdminUserController extends BaseController {

	/**
     * The layout that should be used for responses.
     */
	protected $layout = 'admin.layouts.admin';

	/**
	 * GET:Landing page for users controller
	 * @return View
	 */
	public function index()
	{
		//$users = User::all();
	    $users = User::paginate(2);
	    $this->layout->content = View::make('admin.users.index')->with('users', $users);
	}

	/**
	 * GET:Registration page+form 
	 * @return View
	 */
	public function create()
	{
		$this->layout->content = View::make('admin.users.create');
	}

	/**
	 * GET:Show user details 
	 * @return View
	 */
	public function show($id)
	{
		$user = User::find($id);
		$this->layout->content = View::make('admin.users.show')->with('user', $user);
	}

	/**
	 * POST: Registration post methods
	 * @return Redirect
	 */
	public function store()
	{
		$input = Input::all();

		$rules = array(
			'email' => 'required|unique:users|email', // unique( checks if email is unique )
			'password' => 'required',
			'username' => 'required|unique:users'
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails()) {
			return Redirect::to('admin/users/create')->withErrors($validator);
		} else {
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User;
			$user->email = $input['email'];
			$user->is_admin = $input['is_admin'];
			$user->password = $password;
			$user->username = $input['username'];
			$user->save();

			return Redirect::to('/admin/users')->with('flash_notice', 'User was created.');

		}
	}

	/**
	 * GET:Edit user 
	 * @return View
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$this->layout->content = View::make('admin.users.edit')->with('user', $user);
	}

	/**
	 * PUT:Edit user 
	 * @return View
	 */
	public function update($id)
	{
		$input = Input::all();

		$rules = array(
			'email' => 'required|unique:users,email,'.$id.'|email',
			'username' => 'required|unique:users,username,'.$id
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails()) {
			return Redirect::to('/admin/users/'.$id.'/edit')->withErrors($validator);
		} else {

			$affectedRows = User::where('id', '=', $id)->update(array('email' => $input['email'], 'username' => $input['username']));
			// add is_admin to update
			$users = User::all();
			return Redirect::to('admin/users')
				->with('users', $users)
				->with('flash_notice', 'User has been updated.');

		}		
	}

	/**
	 * DELETE:delete user 
	 * @return View
	 */
	public function destroy($id)
	{
		$user = User::where('id', $id);

        $user->delete();

        return Redirect::to('/admin/users')->with('flash_notice', 'User is deleted.');

	}



}