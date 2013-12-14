<?php
 
class BlogController extends BaseController {
 	
	/**
     * The layout that should be used for responses.
     */
	protected $layout = 'layouts.main';


    public function index()
    {
        // get the posts from the database by asking the Active Record for "all"
        //$posts = Post::all();
        $posts = Post::paginate(5);
 
        // and create a view which we return - note dot syntax to go into folder
        $this->layout->content = View::make('blog.index', array('posts' => $posts));
    }

    public function show($id)
	{
		$post = Post::find($id);
		$this->layout->content = View::make('blog.show')->with('post', $post);
	}

}