<?php

class AdminBlogController extends BaseController {


	protected $layout = 'admin.layouts.admin';

	public function __constrct()
	{
		$this->beforeFilter('csrf', array('on' => 'store'));
	}

	public function index()
	{
        $posts = Post::paginate(5);
 
        $this->layout->content = View::make('admin.blog.index', array('posts' => $posts));
	}


	public function show($id)
	{
        $post = Post::Find($id);
 
        $this->layout->content = View::make('admin.blog.show', array('post' => $post));
	}


	public function create()
	{
		$this->layout->content = View::make('admin.blog.create');
	}


	public function store()
	{
		$input = Input::all();

		$rules = array('title' => 'required');

		$validator = Validator::make($input, $rules);

		if($validator->fails()) {
			return Redirect::to('admin/blog/create')->withErrors($validator);
		} else {

			$post = new Post;
			$post->title = $input['title'];
			$post->content = $input['content'];
			$post->save();

			return Redirect::to('/admin/blog')->with('flash_notice', 'Post was created.');

		}
	}


	public function edit($id)
	{
		$post = Post::find($id);
		$this->layout->content = View::make('admin.blog.edit')->with('post', $post);
	}


	public function update($id)
	{
		$input = Input::all();

		$rules = array('title' => 'required');

		$validator = Validator::make($input, $rules);

		if($validator->fails()) {
			return Redirect::to('/admin/blog/'.$id.'/edit')->withErrors($validator);
		} else {

			$affectedRows = Post::where('id', '=', $id)->update(array('title' => $input['title'], 'content' => $input['content']));

			return Redirect::to('admin/blog')
				->with('flash_notice', 'Post has been updated.');

		}		
	}


	public function destroy($id)
	{
		$post = Post::where('id', $id);

        $post->delete();

        return Redirect::to('/admin/blog')->with('flash_notice', 'Post is deleted.');

	}

}