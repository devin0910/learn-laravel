<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return Redirect::to('blog');
});

Route::resource('blog', 'BlogController'); // open to the world

Route::group(array('before' => 'auth'), function() // example of route grouping
 {

	Route::get('welcome', array('as' => 'welcome', 'uses' => 'HomeController@showWelcome')); // should be inserted above
    Route::get('user/profile', 'UserController@profile');
    Route::resource('user', 'UserController');

});


/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    Route::get('/', function()
    {
        return Redirect::to('admin/dashboard');
    });
    Route::resource('dashboard', 'AdminDashboardController');
    Route::resource('users', 'AdminUserController');
    Route::resource('blog', 'AdminBlogController');

});

/**
 * Password Routes
 * all routes used below are for the password reset/reminders
 */
Route::get('password/remind', function()
{
    return View::make('passwordReminder');
});

Route::post('password/remind', function()
{
    $credentials = array('email' => Input::get('email'));

    return Password::remind($credentials, function($message, $user)
    {
        $message->subject('Your Password Reminder');
    });
});

Route::get('password/reset/{token}', function($token)
{
    return View::make('auth.reset')->with('token', $token);
});

Route::post('password/reset/{token}', function()
{
    $credentials = array('email' => Input::get('email'));

    return Password::reset($credentials, function($user, $password)
    {
        $user->password = Hash::make($password);

        $user->save();

        return Redirect::to('')
            ->with('flash_success', 'Password has been reset.');
    });
});


/**
 * Login Routes
 * todo: create auth controller and insert the following code below:
 */
Route::get('/login', function()
{
    return View::make('login');
});

Route::post('/login', function()
{
    $rules = array('email' => 'required', 'password' => 'required');
    $messages = array(
 		'required' => 'The :attribute field is required.',
	);
	//$messages = $validator->messages();
    $validator = Validator::make(Input::all(), $rules, $messages);

    if ($validator->fails())
    {
    	// return to the form with errors and input data
        return Redirect::to('/login')
        	->withErrors($validator)
        	->withInput(); 
    }

    if(Auth::attempt( ['email' => Input::get('email'), 'password' => Input::get('password')] )) // make a login attempt
    {
		return Redirect::to('/welcome')
    		->with('flash_notice', 'You are now logged in.');
    }else{
    	return Redirect::to('/login')
        	->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
    }

});

Route::get('logout', array('as' => 'logout', function () 
{
    Auth::logout();

    return Redirect::to('/login')
    	->with('flash_notice', 'You are successfully logged out.');

}))->before('auth');


// config 配置信息
Route::get('config', function () {
   // dd(Config::get('app.locale'));
    return app()->environment();
});

// 程序的异常处理
Route::get('exception', function () {
    throw new AbcException('运行时错误！');
});

// 关于路由参数
/*Route::get('/books/{category}', function($category) {
    return "Books in the {$category} category.";
});*/

Route::get("/books/{id}", 'BookController@view')->where('id', "[0-9]+");
Route::get("/books/{category?}", 'BookController@category');


Route::get('show404', function () {
    //App::abort(404);
    App::abort(404, '找不到页面！');
    
    // throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException("找不到页面！");
});

class AbcException extends Exception {}